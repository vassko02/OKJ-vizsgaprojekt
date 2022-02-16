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
        reservation aktualis = new reservation();
        double szorzo = 1;
        bool vanolyanszoba = false;
        bool editlesz = true;
        double ar;
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
                aktualis.RoomID = model.RoomID;
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
            aktualis.Message = egyfoglalas.Message;
            aktualis.ReservationID = egyfoglalas.ReservationID;
            customer a = (customer)cb_vendegek.SelectedItem;
            aktualis.CustomerID = a.CustomerID;
            if (tb_adults.Text == "" || tb_childer.Text == "")
            {
                vanerror = true;
            }
            else
            {
                aktualis.Adults = int.Parse(tb_adults.Text);
                aktualis.Children = int.Parse(tb_childer.Text);
            }
            aktualis.ArrivalDate = Convert.ToDateTime(dp_checkin.SelectedDate);
            aktualis.LeavingDate = Convert.ToDateTime(dp_checkout.SelectedDate);
            aktualis.GuestNumber = aktualis.Children + aktualis.Adults;
            if (aktualis.GuestNumber % 2 == 0)
            {
                aktualis.Capacity = aktualis.GuestNumber;
            }
            else
            {
                aktualis.Capacity = aktualis.GuestNumber + 1;
            }
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
            if (cb_rooms.SelectedItem != null)
            {
                aktualis.RoomName = cb_rooms.SelectedItem.ToString();

            }
            else
            {
                vanerror = true;
            }
            szabadszobak = room.selectCorrectRoom(aktualis);
            int napok = (int)aktualis.LeavingDate.Subtract(aktualis.ArrivalDate).TotalDays;
            bool teszelt = false;
            if (cb_rooms.SelectedItem != null)
            {
                if (szabadszobak.Count != 0)
                {
                    aktualis.RoomID = szabadszobak[0].RoomID;
                    aktualis.RoomPrice = szabadszobak[0].RoomPrice;
                    aktualis.Capacity = room.selectRoomByID(aktualis.RoomID)[0].Capacity;
                    vanolyanszoba = true;
                    teszelt = true;
                }
                else
                {
                    teszelt = true;
                    vanolyanszoba = false;
                }
                aktualis.Price = (aktualis.RoomPrice + aktualis.ServicePrice) * napok * szorzo;
                string x = aktualis.Price.ToString("F2");
                aktualis.Price = double.Parse(x);
            }
            if (editlesz == true && aktualis.RoomName == egyfoglalas.RoomName && vanolyanszoba == false)
            {
                fogyik = consumption.selectItemByReservationID(aktualis.ReservationID);
                consumption.deleteBYREsID(aktualis.ReservationID);
                reservation.delete(aktualis.ReservationID);
                napok = (int)aktualis.LeavingDate.Subtract(aktualis.ArrivalDate).TotalDays;
                aktualis.RoomPrice = room.selectRoomByID(aktualis.RoomID)[0].RoomPrice;
                aktualis.Capacity = room.selectRoomByID(aktualis.RoomID)[0].Capacity;
                aktualis.Price = (aktualis.RoomPrice + aktualis.ServicePrice) * napok * szorzo;
                string temp = aktualis.Price.ToString("F2");
                aktualis.Price = double.Parse(temp);
                int f = reservation.insert(aktualis);
                foreach (var item in fogyik)
                {
                    consumption.insertkokany(item.Price, item.ItemName, f);
                }
                teszelt = true;
                vanolyanszoba = true;
            }
            if (egyuser.activated_at != "")
            {
                aktualis.Level = customer.selectuserByID(aktualis.CustomerID)[0].Level;
                vizsgalat();
            }
            else
            {
                aktualis.Level = "";
            }
            if ((tb_adults.Text == "0" && tb_childer.Text == "0") || tb_adults.Text == "0")
            {
                vanerror = true;
            }
            if (dp_checkout.SelectedDate <= dp_checkin.SelectedDate || vanerror == true || dp_checkin.SelectedDate < DateTime.Today || dp_checkout.SelectedDate < DateTime.Today)
            {
                MessageBox.Show("There is something wrong with the provided data,or all the suitable rooms are reserved at the specified time!", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
                teszelt = false;
            }
            if (vanolyanszoba == false && teszelt == true)
            {
                MessageBox.Show("There is something wrong with the provided data,or all the suitable rooms are reserved at the specified time!", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
                vanerror = true;
            }
            if (editlesz == true && vanerror == false)
            {
                log.callInsertIntoLog("Admin","Edited reservation","Reservation",aktualis.ReservationID);
                reservation.update(aktualis);
                DialogResult = true;
                this.Close();
            }
            if (editlesz != true && vanerror == false)
            {
                int count = reservation.selectCountByGuestID(aktualis.CustomerID);
                int x=reservation.insert(aktualis);
                log.callInsertIntoLog("Admin", "Added a new reservation", "Reservation", x);
                egyuser = customer.selectuserByID(aktualis.CustomerID)[0];
                if (egyuser.activated_at != "")
                {
                    egyuser.Level = szintcsekk(count);
                }
                else
                {
                    egyuser.Level = "";
                }
                customer.updateResNumber(aktualis.CustomerID, count + 1, egyuser.Level);
                DialogResult = true;
                this.Close();
            }
        }
        public void arfrissit()
        {
            if (!(cb_rooms.SelectedItem==null|| cb_services.SelectedItem == null||dp_checkin.SelectedDate>=dp_checkout.SelectedDate))
            {
                DateTime leaving = Convert.ToDateTime(dp_checkout.SelectedDate);
                DateTime arrival = Convert.ToDateTime(dp_checkin.SelectedDate);
                int nap  = (int)leaving.Subtract(arrival).TotalDays;
                double roomPrice = room.selectRoomByName(cb_rooms.SelectedItem.ToString())[0].RoomPrice;
                double servicePrice = servicetype.selectPrice(cb_services.SelectedIndex+1)[0].ServicePrice;
                ar= (roomPrice + servicePrice) * nap * szorzo;
                lbl_price.Text = string.Format("{0}$",ar);
            }
            else
            {
                lbl_price.Text = "Not enough data provided!";
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
            double kedvezmeny;
            switch (egyuser.Level)
            {
                case "Gold":
                    sp_level.Background = Brushes.Gold;
                    lbl_level.Content = "Gold";
                    lbl_level.Foreground = Brushes.Black;
                    lbl_title.Foreground = Brushes.Black;
                    lbl_discount.Foreground = Brushes.Black;
                    lbl_discounttitle.Foreground = Brushes.Black;
                    szorzo = 0.95;
                    break;
                case "Platinum":
                    sp_level.Background = (Brush)bc.ConvertFrom("#E5E4E2");
                    lbl_level.Content = "Platinum";
                    lbl_level.Foreground = Brushes.Black;
                    lbl_title.Foreground = Brushes.Black;
                    lbl_discount.Foreground = Brushes.Black;
                    lbl_discounttitle.Foreground = Brushes.Black;
                    szorzo = 0.90;
                    break;
                case "Diamond":
                    sp_level.Background = (Brush)bc.ConvertFrom("#b9f2ff");
                    lbl_level.Content = "Diamond";
                    lbl_level.Foreground = Brushes.Black;
                    lbl_title.Foreground = Brushes.Black;
                    lbl_discount.Foreground = Brushes.Black;
                    lbl_discounttitle.Foreground = Brushes.Black;
                    szorzo = 0.85;
                    break;
                default:
                    sp_level.Background = Brushes.Transparent;
                    lbl_level.Content = "Not ranked";
                    lbl_level.Foreground = Brushes.White;
                    lbl_title.Foreground = Brushes.White;
                    lbl_discount.Foreground = Brushes.White;
                    lbl_discounttitle.Foreground = Brushes.White;
                    szorzo = 1;
                    break;
            }
            kedvezmeny = 100 - szorzo * 100;
            lbl_discount.Content = string.Format("{0}%", kedvezmeny);
        }

        public string szintcsekk(int resnumber)
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
            if (cb_rooms.SelectedItem.ToString() != "")
            {
                aktualis.RoomName = cb_rooms.SelectedItem.ToString();
            }
            arfrissit();
        }

        private void dp_checkin_SelectedDateChanged(object sender, SelectionChangedEventArgs e)
        {
            arfrissit();
        }

        private void dp_checkout_SelectedDateChanged(object sender, SelectionChangedEventArgs e)
        {
            arfrissit();
        }

        private void cb_services_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            arfrissit();
        }
    }
}
