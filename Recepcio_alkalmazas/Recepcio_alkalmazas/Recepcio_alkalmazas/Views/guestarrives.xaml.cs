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
    /// Interaction logic for guestarrives.xaml
    /// </summary>
    public partial class guestarrives : Page
    {
        ObservableCollection<reservation> foglalasok = new ObservableCollection<reservation>();
        reservation egyfoglalas = new reservation();
        double x;
        public guestarrives()
        {
            InitializeComponent();
            btn_fizetes.IsEnabled = false;
            foglalasok = reservation.selectByGuestName(null, 0, false);
            dg_nevek.DataContext = foglalasok;
            sp_adatok.DataContext = egyfoglalas;
            dg_nevek.SelectedIndex = 0;
            btn_fizetes.IsEnabled = false;
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
        private void tb_guestinput_TextChanged(object sender, TextChangedEventArgs e)
        {
            foglalasok = reservation.selectByGuestName(tb_guestinput.Text, 0, false);
            dg_nevek.ItemsSource = foglalasok;
        }
        private void dg_nevek_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            if (dg_nevek.SelectedItem != null)
            {
                egyfoglalas = (reservation)dg_nevek.SelectedItem;
                sp_adatok.DataContext = egyfoglalas;
                tb_change.Text = tb_fizetett.Text = "";
                x = egyfoglalas.Price;

            }
        }
        private void btn_utofizetes_Click(object sender, RoutedEventArgs e)
        {
            consumption uj = new consumption(egyfoglalas.Price, "Accomodation", egyfoglalas.ReservationID);
            consumption.insert(uj);
            reservation.updateCheckedin(egyfoglalas.ReservationID, 1);
            foglalasok = reservation.selectByGuestName(null, 0, false);
            dg_nevek.DataContext = foglalasok;
        }
        private void tb_fizetett_TextChanged(object sender, TextChangedEventArgs e)
        {
            if (tb_fizetett.Text != "")
            {
                string osszeg = (double.Parse(tb_fizetett.Text) - egyfoglalas.Price).ToString("F");
                tb_change.Text = "$ " + osszeg;
                if (double.Parse(tb_fizetett.Text) < egyfoglalas.Price)
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
        private void btn_fizetes_Click(object sender, RoutedEventArgs e)
        {
            reservation valasztott = (reservation)dg_nevek.SelectedItem;
            string name = customer.selectGuestNameByResID(valasztott.ReservationID)[0].Name;
            if (btn_kartya.IsChecked == true)
            {
                var cardpayment = new CardPayment();
                if (cardpayment.ShowDialog() == true)
                {
                    MessageBox.Show("Payment successful!", "Payment Information", MessageBoxButton.OK, MessageBoxImage.Information);
                    cashregister.insert(new cashregister(name, x, "Guest paying when checking-in (CARD)", x, 0));
                    reservation.updateCheckedin(egyfoglalas.ReservationID, 1);
                    tb_change.Text = tb_fizetett.Text = "";
                    foglalasok = reservation.selectByGuestName(null, 0, false);
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
                reservation.updateCheckedin(egyfoglalas.ReservationID, 1);
                double paid = double.Parse(tb_fizetett.Text);
                double change = double.Parse(tb_change.Text.Split(' ')[1]);
                cashregister.insert(new cashregister(name, x, "Guest paying at check-in", paid, change));
                tb_change.Text = tb_fizetett.Text = "";
                foglalasok = reservation.selectByGuestName(null, 0, false);
                dg_nevek.DataContext = foglalasok;
            }
        }
        private static readonly Regex _regex = new Regex("[^0-9,-]+"); //regex that matches disallowed text
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
