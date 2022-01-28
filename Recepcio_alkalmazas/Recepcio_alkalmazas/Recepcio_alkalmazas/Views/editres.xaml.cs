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
        ObservableCollection<consumption> fogyik = new ObservableCollection<consumption>();
        customer egyuser = new customer();
        double szorzo = 1;
        int RoomIDkesobbre;
        bool editlesz = true;
        public editres(reservation model)
        {
            InitializeComponent();   
            egyfoglalas = model;
            szobak = room.selectAllRooms();
            this.DataContext = egyfoglalas;
            RoomIDkesobbre = egyfoglalas.RoomID;
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
            aktualis.IsCheckedIn = egyfoglalas.IsCheckedIn;
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
            int napok = (int)aktualis.LeavingDate.Subtract(aktualis.ArrivalDate).TotalDays;
            bool vanolyanszoba = false;
            bool teszelt = false;
            if (cb_rooms.SelectedItem != null)
            {
                aktualis.RoomName = cb_rooms.Text;
                foreach (var item in szabadszobak)
                {
                    if (item.RoomName == aktualis.RoomName)
                    {
                        aktualis.RoomID = item.RoomID;
                        aktualis.RoomPrice = room.selectRoomByID(aktualis.RoomID)[0].RoomPrice;
                        if (egyuser.activated_at!="")
                        {
                            aktualis.Level = customer.selectuserByID(aktualis.CustomerID)[0].Level;
                            vizsgalat();
                        }
                        else
                        {
                            aktualis.Level = "";
                        }
                        aktualis.Price = (aktualis.RoomPrice + aktualis.ServicePrice) * napok*szorzo;
                        string x = aktualis.Price.ToString("F2");
                        aktualis.Price = double.Parse(x);
                        aktualis.RoomName = room.selectRoomByID(aktualis.RoomID)[0].RoomName;
                        aktualis.Capacity = room.selectRoomByID(aktualis.RoomID)[0].Capacity;
                        vanolyanszoba = true;
                        teszelt = true;
                        break;
                    }
                }
                if (editlesz==true&&aktualis.RoomName==egyfoglalas.RoomName&&vanolyanszoba==false)
                {
                    fogyik = consumption.selectItemByReservationID(aktualis.ReservationID);
                    consumption.deleteBYREsID(aktualis.ReservationID);
                    reservation.delete(aktualis.ReservationID);
                    aktualis.RoomID = RoomIDkesobbre;
                    napok = (int)aktualis.LeavingDate.Subtract(aktualis.ArrivalDate).TotalDays;
                    aktualis.RoomPrice = room.selectRoomByID(aktualis.RoomID)[0].RoomPrice;                
                    aktualis.Price = (aktualis.RoomPrice + aktualis.ServicePrice) * napok*szorzo;
                    string temp = aktualis.Price.ToString("F2");
                    aktualis.Price = double.Parse(temp);
                    int f =reservation.insert(aktualis);
                    foreach (var item in fogyik)
                    {
                        consumption.insertkokany(item.Price,item.ItemName,f);
                    }
                    teszelt = true;
                    vanolyanszoba = true;
                }
            }
            else
            {
                vanerror = true;
            }
            if (tb_adults.Text==""||tb_childer.Text==""||(tb_adults.Text=="0"&&tb_childer.Text=="0"))
            {
                vanerror = true;
            }
            if (dp_checkout.SelectedDate <= dp_checkin.SelectedDate || vanerror == true || dp_checkin.SelectedDate < DateTime.Today || dp_checkout.SelectedDate < DateTime.Today)
            {
                MessageBox.Show("There is something wrong with the provided data!", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
                vanerror = true;
            }
            if (vanolyanszoba == false&&teszelt==true)
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
                aktualis.RoomID = RoomIDkesobbre;
                reservation.insert(aktualis);
                egyuser = customer.selectuserByID(aktualis.CustomerID)[0];
                if (egyuser.activated_at != "")
                {
                    egyuser.Level = szintcsekk(egyuser.ReservationNumber);
                }
                else
                {
                    egyuser.Level = "";
                }
                customer.updateResNumber(aktualis.CustomerID, egyuser.ReservationNumber + 1, egyuser.Level);
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

        private void cb_vendegek_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            vizsgalat();
        }

        private void vizsgalat()
        {
            customer temp = (customer)cb_vendegek.SelectedItem;
            egyuser = customer.selectuserByID(temp.CustomerID)[0];
            BrushConverter bc = new BrushConverter();
            switch (egyuser.Level)
            {
                case "Gold":
                    sp_level.Background = Brushes.Gold;
                    lbl_level.Content = "Gold";
                    lbl_level.Foreground = Brushes.Black;
                    lbl_title.Foreground = Brushes.Black;
                    szorzo = 0.95;
                    break;
                case "Platinum":
                    sp_level.Background = (Brush)bc.ConvertFrom("#E5E4E2");
                    lbl_level.Content = "Platinum";
                    lbl_level.Foreground = Brushes.Black;
                    lbl_title.Foreground = Brushes.Black;
                    szorzo = 0.90;
                    break;
                case "Diamond":
                    sp_level.Background = (Brush)bc.ConvertFrom("#b9f2ff");
                    lbl_level.Content = "Diamond";
                    lbl_level.Foreground = Brushes.Black;
                    lbl_title.Foreground = Brushes.Black;
                    szorzo = 0.85;
                    break;
                default:
                    lbl_level.Content = "This user is not ranked yet";
                    sp_level.Background = Brushes.Transparent;
                    lbl_level.Foreground = Brushes.White;
                    lbl_title.Foreground = Brushes.White;
                    szorzo = 1;
                    break;
            }
        }

        public string szintcsekk(int resnumber )
        {
            string szint = "";
            switch (resnumber)
            {
                case 0:
                    szint = "";
                    break;
                case 1:
                    szint = "";
                    break;
                case 2:
                    szint = "Gold";
                    break;
                case 3:
                    szint = "Gold";
                    break;
                case 4:
                    szint = "Gold";
                    break;
                case 5:
                    szint = "Gold";
                    break;
                case 6:
                    szint = "Platinum";
                    break;
                case 7:
                    szint = "Platinum";
                    break;
                case 8:
                    szint = "Platinum";
                    break;
                case 9:
                    szint = "Platinum";
                    break;
                default:
                    szint = "Diamond";
                    break;
            }
            return szint;
        }

        private void cb_rooms_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            RoomIDkesobbre = cb_rooms.SelectedIndex+1;
        }
    }
}
