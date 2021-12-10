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
        ObservableCollection<customer> vendegek = new ObservableCollection<customer>();
        reservation eredeti = new reservation();
        bool editlesz = true;
        public editres(reservation model)
        {
            InitializeComponent();
            egyfoglalas = model;
            szobak = room.selectAllRooms();
            this.DataContext = egyfoglalas;
            cb_vendegek.ItemsSource = customer.selectGuestNames().Select(x=>x.Name).Distinct();
            //nem jelenik meg a vendég nevek a cbben

            if (egyfoglalas.ReservationID == 0)
            {
                editlesz = false;
                egyfoglalas.ArrivalDate = DateTime.Today;
                egyfoglalas.LeavingDate = DateTime.Today;
                cb_vendegek.SelectedIndex = 0;
            }
            else
            {
                cb_vendegek.IsEditable = false;
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
            reservation aktualis = new reservation();
            aktualis.ReservationID = egyfoglalas.ReservationID;
            aktualis.CustomerID = egyfoglalas.CustomerID;
            aktualis.Adults = int.Parse(tb_adults.Text);
            aktualis.Children = int.Parse(tb_childer.Text);
            aktualis.ArrivalDate = Convert.ToDateTime(dp_checkin.SelectedDate);
            aktualis.LeavingDate = Convert.ToDateTime(dp_checkout.SelectedDate);
            aktualis.GuestNumber = aktualis.Children + aktualis.Adults;
            aktualis.ServiceID = servicetype.selectIDbyName(cb_services.Text)[0].ServiceID;
            szabadszobak = room.selectCorrectRoom(aktualis);
            aktualis.ServiceType = servicetype.selectNameByID(aktualis.ServiceID)[0].ServiceType;
            aktualis.RoomName = cb_rooms.Text;
            int napok = (int)aktualis.LeavingDate.Subtract(aktualis.ArrivalDate).TotalDays;
            aktualis.ServicePrice = servicetype.selectPrice(aktualis.ServiceID)[0].ServicePrice;
            bool vanolyanszoba = false;
            foreach (var item in szabadszobak)
            {
                if (item.RoomName==aktualis.RoomName)
                {
                    aktualis.RoomID = item.RoomID;
                    aktualis.RoomPrice = room.selectPriceByID(aktualis.RoomID)[0].RoomPrice;
                    aktualis.Price = aktualis.RoomPrice * napok+aktualis.ServicePrice;
                    aktualis.RoomName = room.selectRoomByID(aktualis.RoomID)[0].RoomName;
                    vanolyanszoba = true;
                    break;
                }               
            }
            if(vanolyanszoba==false)
            {
                MessageBox.Show("There is no free room of that type in the selected interval!", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
            }
            if (editlesz == true)
            {             
                reservation.update(aktualis);
            }
            else
            {
                //reservation.insert(aktualis);
            }
            DialogResult = true;
            this.Close();
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
    }
}
