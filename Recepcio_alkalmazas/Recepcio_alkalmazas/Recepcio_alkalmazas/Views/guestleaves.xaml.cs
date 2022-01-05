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
using System.IO;
using Recepcio_alkalmazas.Models;
using System.Collections.ObjectModel;
using System.Text.RegularExpressions;

namespace Recepcio_alkalmazas.pages
{
    /// <summary>
    /// Interaction logic for guestleaves.xaml
    /// </summary>
    public partial class guestleaves : Page
    {
        ObservableCollection<reservation> foglalasok = reservation.selectByGuestName(null, 1, false);
        ObservableCollection<consumption> fogyasztasok = new ObservableCollection<consumption>();
        ObservableCollection<consumption> osszeg = new ObservableCollection<consumption>();
        reservation egyfoglalas = new reservation();
        double x;
        public guestleaves()
        {
            InitializeComponent();
            dg_nevek.DataContext = foglalasok;
            btn_fizetes.IsEnabled = false;
            dg_fogyasztas.DataContext = fogyasztasok;
            dg_nevek.SelectedIndex = 0;

        }
        private void tb_guestinput_TextChanged(object sender, TextChangedEventArgs e)
        {
            foglalasok = reservation.selectByGuestName(tb_guestinput.Text, 1, false);
            dg_nevek.ItemsSource = foglalasok;

        }

        private void btn_keszpenz_Click(object sender, RoutedEventArgs e)
        {
            if (btn_keszpenz.IsChecked == true)
            {
                btn_kartya.IsChecked = false;
            }
            else
            {
                btn_kartya.IsEnabled = true;
            }
            if ((btn_keszpenz.IsChecked == false && btn_kartya.IsChecked == false) || tb_fizetett.Text == "")
            {
                btn_fizetes.IsEnabled = false;
            }
            else
            {
                btn_fizetes.IsEnabled = true;
            }
        }

        private void btn_kartya_Click(object sender, RoutedEventArgs e)
        {
            if (btn_keszpenz.IsChecked == true)
            {
                btn_keszpenz.IsChecked = false;
                tb_fizetett.Text = "";
            }
            else
            {
                btn_keszpenz.IsEnabled = true;
            }
            if (btn_keszpenz.IsChecked == false && btn_kartya.IsChecked == false)
            {
                btn_fizetes.IsEnabled = false;
            }
            if (btn_keszpenz.IsChecked == false && btn_kartya.IsChecked == false)
            {
                btn_fizetes.IsEnabled = false;
            }
            else
            {
                btn_fizetes.IsEnabled = true;
            }
        }

        private void dg_nevek_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            if (dg_nevek.SelectedItem != null)
            {
                reservation valasztott = (reservation)dg_nevek.SelectedItem;
                int id = valasztott.ReservationID;
                fogyasztasok = consumption.selectItemByReservationID(id);
                dg_fogyasztas.DataContext = fogyasztasok;
                if (fogyasztasok.Count != 0)
                {
                    osszeg = consumption.selectSumByID(id);
                    x = osszeg[0].osszeg;

                }
                lbl_vegosszeg.Content ="$"+x.ToString("F");
                egyfoglalas = (reservation)dg_nevek.SelectedItem;
                tb_change.Text = tb_fizetett.Text = "";
                btn_kartya.IsChecked = btn_keszpenz.IsChecked = false;
            }
            if (dg_nevek.Items.Count==0)
            {
                lbl_vegosszeg.Content = "";
                fogyasztasok.Clear();
                dg_fogyasztas.ItemsSource = fogyasztasok;
            }
        }

        private void btn_remove_Click(object sender, RoutedEventArgs e)
        {
            if (dg_fogyasztas.SelectedItem != null)
            {
                consumption valasztott = (consumption)dg_fogyasztas.SelectedItem;
                int id = valasztott.ConsumptionID;
                consumption.delete(id);
                reservation valasztottres = (reservation)dg_nevek.SelectedItem;
                int id2 = valasztottres.ReservationID;
                fogyasztasok = consumption.selectItemByReservationID(id2);
                dg_fogyasztas.DataContext = fogyasztasok;
            }
        }

        private void btn_fizetes_Click(object sender, RoutedEventArgs e)
        {
            if (dg_nevek.Items.Count!=0)
            {
                reservation valasztott = (reservation)dg_nevek.SelectedItem;
                string name = customer.selectGuestNameByResID(valasztott.ReservationID)[0].Name;
                if (btn_kartya.IsChecked == true)
                {
                    var cardpayment = new CardPayment();
                    if (cardpayment.ShowDialog() == true)
                    {
                        MessageBox.Show("Payment successful!", "Payment Information", MessageBoxButton.OK, MessageBoxImage.Information);
                        cashregister.insert(new cashregister(name, x, "Guest paying when checking-out (CARD)", x, 0));
                        tb_change.Text = tb_fizetett.Text = "";
                        reservation.updateCheckedin(egyfoglalas.ReservationID, 0);
                        foglalasok = reservation.selectByGuestName(null, 1, false);
                        dg_nevek.DataContext = foglalasok;
                    }
                    else
                    {
                        MessageBox.Show("Payment cancelled!", "Payment Information", MessageBoxButton.OK, MessageBoxImage.Information);
                    }
                }
                else
                {
                    MessageBox.Show("Payment successful!", "Payment Information", MessageBoxButton.OK, MessageBoxImage.Information);
                    double paid = double.Parse(tb_fizetett.Text);
                    double change = double.Parse(tb_change.Text.Split(' ')[1]);
                    cashregister.insert(new cashregister(name, x, "Guest paying when checking-out", paid, change));
                    tb_change.Text = tb_fizetett.Text = "";
                    reservation.updateCheckedin(egyfoglalas.ReservationID, 0);
                    foglalasok = reservation.selectByGuestName(null, 1, false);
                    dg_nevek.DataContext = foglalasok;
                }
            }
        }

        private void tb_fizetett_TextChanged(object sender, TextChangedEventArgs e)
        {
            if (tb_fizetett.Text != "")
            {
                string osszeg = (double.Parse(tb_fizetett.Text) - x).ToString("F");

                tb_change.Text = "$ " + osszeg;
                if (double.Parse(tb_fizetett.Text) < x)
                {
                    tb_change.Text = "Not enough!";
                    btn_fizetes.IsEnabled = false;
                }
                else
                {
                    btn_fizetes.IsEnabled = true;
                }
            }
        }

        private static readonly Regex _regex = new Regex("[^0-9.]"); //regex that matches disallowed text
        private static bool IsTextAllowed(string text)
        {
            return !_regex.IsMatch(text);
        }

        private void tb_fizetett_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            e.Handled = !IsTextAllowed(e.Text);
        }
    }
}
