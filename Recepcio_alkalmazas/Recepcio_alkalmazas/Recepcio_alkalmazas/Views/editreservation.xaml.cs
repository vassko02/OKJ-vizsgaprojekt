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
using System.IO;
using System.Windows.Shapes;
using Recepcio_alkalmazas.Models;
using Recepcio_alkalmazas.Views;
using System.Collections.ObjectModel;

namespace Recepcio_alkalmazas.pages
{
    /// <summary>
    /// Interaction logic for editreservation.xaml
    /// </summary>
    public partial class editreservation : Page
    {
        ObservableCollection<reservation> foglalasok = new ObservableCollection<reservation>();
        reservation egyfoglalas = new reservation();
        public editreservation()
        {
            InitializeComponent();
            foglalasok = reservation.selectByGuestName(null);
            dg_foglalasok.ItemsSource = foglalasok;
            dg_foglalasok.SelectedIndex = 0;
        }
        private void tb_guestinput_TextChanged(object sender, TextChangedEventArgs e)
        {
            foglalasok = reservation.selectByGuestName(tb_guestinput.Text);
            dg_foglalasok.ItemsSource = foglalasok;
        }

        private void btn_torles_Click(object sender, RoutedEventArgs e)
        {
            if (dg_foglalasok.SelectedIndex != -1)
            {
                if (MessageBox.Show("Are you sure you want to delete the selected reservation?", "Confirmation", MessageBoxButton.YesNo, MessageBoxImage.Question) == MessageBoxResult.Yes)
                {
                    reservation.delete(egyfoglalas.ReservationID);
                    tb_guestinput.Text = "";
                    foglalasok = reservation.selectByGuestName(null);
                    dg_foglalasok.ItemsSource = foglalasok;
                }
            }
        }
        private void dg_foglalasok_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            egyfoglalas = (reservation)dg_foglalasok.SelectedItem;
        }
        private void btn_edit_Click(object sender, RoutedEventArgs e)
        {
            if (dg_foglalasok.SelectedItem==null)
            {
                return;
            }
            reservation foglalasmodosit = (reservation)dg_foglalasok.SelectedItem;
            var modositasablak = new editres(foglalasmodosit);
            if (modositasablak.ShowDialog()==true)
            {
                foglalasok = reservation.selectByGuestName(null);
                dg_foglalasok.ItemsSource = foglalasok;
                dg_foglalasok.SelectedIndex = 0;
             }
        }
        private void btn_hozzaad_Click(object sender, RoutedEventArgs e)
        {
            reservation foglalasad = new reservation();
            var hozzaad = new editres(foglalasad);         
            if (hozzaad.ShowDialog()==true)
            {
                foglalasok = reservation.selectByGuestName(null);
                dg_foglalasok.ItemsSource = foglalasok;
                dg_foglalasok.SelectedIndex = 0;
            }
        }
        private void btn_guestadd_Click(object sender, RoutedEventArgs e)
        {
            var vendegadd = new AddGuest();
            vendegadd.ShowDialog();
        }
    }
}
