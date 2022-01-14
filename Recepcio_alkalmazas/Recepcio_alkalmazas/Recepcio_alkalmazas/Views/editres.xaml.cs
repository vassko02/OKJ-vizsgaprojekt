using System;
using System.Collections.Generic;
using System.Text;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Collections.ObjectModel;
using Recepcio_alkalmazas.Models;
using System.Linq;
using System.Text.RegularExpressions;

namespace Recepcio_alkalmazas.Views
{
    /// <summary>
    /// Interaction logic for editres.xaml
    /// </summary>
    public partial class editres : Window
    {
        reservation egyfoglalas = new reservation();
        ObservableCollection<servicetype> tipusok = new ObservableCollection<servicetype>();
        ObservableCollection<room> szobak = new ObservableCollection<room>();
        ObservableCollection<room> szabadszobak = new ObservableCollection<room>();
        bool editlesz = true;
        public editres(reservation model)
        {
            InitializeComponent();
            egyfoglalas = model;
            szobak = room.selectAllRooms();
            this.DataContext = egyfoglalas;
            cb_vendegek.ItemsSource = customer.selectGuestNames();
            if (egyfoglalas.ReservationID == 0)
            {
                editlesz = false;
                egyfoglalas.ArrivalDate = DateTime.Today;
                egyfoglalas.LeavingDate = DateTime.Today;
                cb_vendegek.SelectedIndex = 0;
            }
            else
            {
                cb_vendegek.SelectedValue = egyfoglalas.CustomerID;
                cb_vendegek.IsEnabled = false;
            }
            tipusok = servicetype.selectAllNames();
            cb_services.ItemsSource = tipusok;
            cb_rooms.ItemsSource = szobak.Select(x => x.RoomName).Distinct();
            foreach (var item in szobak)
            {
                if (item.RoomName == egyfoglalas.RoomName)
                {
                    cb_rooms.SelectedItem = item.RoomName;
                }
            }
        }
        private void btn_save_Click(object sender, RoutedEventArgs e)
        {
            bool vanerror = false;
            reservation aktualis = new reservation();
            aktualis.ReservationID = egyfoglalas.ReservationID;
            customer a = (customer)cb_vendegek.SelectedItem;
            aktualis.CustomerID = a.CustomerID;
            aktualis.Adults = int.Parse(tb_adults.Text);
            aktualis.Children = int.Parse(tb_childer.Text);
            aktualis.ArrivalDate = Convert.ToDateTime(dp_checkin.SelectedDate);
            aktualis.LeavingDate = Convert.ToDateTime(dp_checkout.SelectedDate);
            aktualis.GuestNumber = aktualis.Children + aktualis.Adults;
            if (cb_services.SelectedItem != null)
            {
                aktualis.ServiceID = servicetype.selectIDbyName(cb_services.Text)[0].ServiceID;
                aktualis.ServiceType = servicetype.selectNameByID(aktualis.ServiceID)[0].ServiceType;
                aktualis.ServicePrice = servicetype.selectPrice(aktualis.ServiceID)[0].ServicePrice;
            }
            else
            {
                vanerror = true;
            }
            szabadszobak = room.selectCorrectRoom(aktualis);
            bool vanolyanszoba = false;
            int napok = (int)aktualis.LeavingDate.Subtract(aktualis.ArrivalDate).TotalDays;
            if (cb_rooms.SelectedItem != null)
            {
                aktualis.RoomName = cb_rooms.Text;
                ObservableCollection<room> egyszoba = room.selectRoomByID(aktualis.RoomID);
                foreach (var item in szabadszobak)
                {
                    if (item.RoomName == aktualis.RoomName)
                    {
                        aktualis.RoomID = item.RoomID;
                        aktualis.RoomPrice = room.selectRoomByID(aktualis.RoomID)[0].RoomPrice;
                        aktualis.Price = (aktualis.RoomPrice + aktualis.ServicePrice) * napok;
                        string x = aktualis.Price.ToString("F2");
                        aktualis.Price = double.Parse(x);
                        aktualis.RoomName = room.selectRoomByID(aktualis.RoomID)[0].RoomName;
                        aktualis.Capacity = room.selectRoomByID(aktualis.RoomID)[0].Capacity;
                        vanolyanszoba = true;
                        break;
                    }
                }
            }
            else
            {
                vanerror = true;
            }
            if (dp_checkout.SelectedDate <= dp_checkin.SelectedDate || vanerror == true || dp_checkin.SelectedDate < DateTime.Today || dp_checkout.SelectedDate < DateTime.Today)
            {
                MessageBox.Show("There is something wrong with the provided data!", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
                vanerror = true;
            }
            if (vanolyanszoba == false)
            {
                MessageBox.Show("All suitable rooms are booked at the specified time!", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
                vanerror = true;
            }
            if (editlesz == true && vanerror == false)
            {
                reservation.update(aktualis);
                DialogResult = true;
                this.Close();
            }
            if (editlesz != true && vanerror == false)
            {
                reservation.insert(aktualis);
                DialogResult = true;
                this.Close();
            }
        }
        private void btn_cancel_Click(object sender, RoutedEventArgs e)
        {
            DialogResult = false;
            reservation.update(egyfoglalas);

            this.Close();
        }
        private void Grid_MouseDown(object sender, MouseButtonEventArgs e)
        {
            if (e.LeftButton == MouseButtonState.Pressed)
            {
                DragMove();
            }
        }
        private static readonly Regex _regex = new Regex("[^0-9-]+"); //regex that matches disallowed text
        private static bool IsTextAllowed(string text)
        {
            return !_regex.IsMatch(text);
        }
        private void tb_childer_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            e.Handled = !IsTextAllowed(e.Text);
        }

        private void tb_adults_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            e.Handled = !IsTextAllowed(e.Text);
        }
    }
}
