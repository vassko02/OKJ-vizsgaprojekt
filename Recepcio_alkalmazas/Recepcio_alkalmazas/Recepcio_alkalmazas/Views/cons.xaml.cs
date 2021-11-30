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
using System.Collections.ObjectModel;
using Recepcio_alkalmazas.Models;

namespace Recepcio_alkalmazas.pages
{
    /// <summary>
    /// Interaction logic for consumption.xaml
    /// </summary>
    public partial class cons : Page
    {
        Dictionary<string, double> lehetosegek = new Dictionary<string, double>();
        List<reservation> foglalasok = new List<reservation>();
        List<consumption> fogyasztasok = new List<consumption>();

        public cons()
        {
            InitializeComponent();
            italfeltolt();
            foglalasok = reservation.selectByGuestName(null);
            dg_nevek.DataContext = foglalasok;
            dg_nevek.SelectedIndex = 0;
            dg_fogyasztas.DataContext = fogyasztasok;
        }
        private void italfeltolt()
        {
            lehetosegek.Add("Coca-Cola", 1.49);
            lehetosegek.Add("Fanta", 1.49);
            lehetosegek.Add("Sprite", 1.49);
            lehetosegek.Add("Natur Aqua", 1.49);
            lehetosegek.Add("Kinley", 1.49);
            lehetosegek.Add("Cappy", 1.49);
            lehetosegek.Add("Aperol spritz", 5.99);
            lehetosegek.Add("Bloody Mary", 9.99);
            lehetosegek.Add("Cosmopolitan", 7.99);
            lehetosegek.Add("Gin Fizz", 6.99);
            lehetosegek.Add("Long Island Ice Tea", 8.99);
            lehetosegek.Add("Margarita", 8.99);
            lehetosegek.Add("Mojito", 9.99);
            lehetosegek.Add("Pina Colada", 7.49);
            lehetosegek.Add("Zombie", 10.49);
            lehetosegek.Add("Massage", 14.99);
            lehetosegek.Add("Hairdresser", 22.99);
            lehetosegek.Add("Billiard", 15.99);
            lehetosegek.Add("Bowling", 14.99);
            lehetosegek.Add("Tennis", 16.99);
            lehetosegek.Add("Breakfast in bead", 8.99);
        }
        private void tb_guestinput_TextChanged(object sender, TextChangedEventArgs e)
        {
            foglalasok = reservation.selectByGuestName(tb_guestinput.Text);
            dg_nevek.ItemsSource = foglalasok;
            if (dg_nevek.Items.Count == 0)
            {
                fogyasztasok.Clear();
            }
        }
        private void StackPanel_MouseUp(object sender, MouseButtonEventArgs e)
        {
            if (dg_nevek.SelectedIndex != -1)
            {
                string valasztottitem = ((StackPanel)sender).Tag.ToString();
                double price = lehetosegek[valasztottitem];
                reservation valasztottRes = (reservation)dg_nevek.SelectedItem;
                int id = valasztottRes.ReservationID;
                consumption.insert(new consumption(price, valasztottitem, id));
                fogyasztasok = consumption.selectItemByReservationID(id);
                dg_fogyasztas.DataContext = fogyasztasok;
            }
        }

        private void btn_eltavolit_Click(object sender, RoutedEventArgs e)
        {
            consumption valasztott = (consumption)dg_fogyasztas.SelectedItem;
            int id = valasztott.ConsumptionID;
            consumption.delete(id);
            reservation valasztottres = (reservation)dg_nevek.SelectedItem;
            int id2 = valasztottres.ReservationID;
            fogyasztasok = consumption.selectItemByReservationID(id2);
            dg_fogyasztas.DataContext = fogyasztasok;
        }

        private void dg_nevek_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            if (dg_nevek.SelectedIndex != -1)
            {
                reservation valasztott = (reservation)dg_nevek.SelectedItem;
                int id = valasztott.ReservationID;
                fogyasztasok = consumption.selectItemByReservationID(id);
                dg_fogyasztas.DataContext = fogyasztasok;

            }

        }
    }
}
