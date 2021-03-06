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
using System.Linq;
using Recepcio_alkalmazas.Models;
using Recepcio_alkalmazas.Views;

namespace Recepcio_alkalmazas.pages
{
    /// <summary>
    /// Interaction logic for consumption.xaml
    /// </summary>
    public partial class cons : Page
    {
        ObservableCollection<reservation> foglalasok = new ObservableCollection<reservation>();
        ObservableCollection<consumption> fogyasztasok = new ObservableCollection<consumption>();
        ObservableCollection<storage> fogylehetoseg = new ObservableCollection<storage>();
        List<string> tipusok = new List<string>();
        reservation valasztottres= new reservation();
        public cons()
        {
            InitializeComponent();
            fogylehetoseg = storage.select();
            foglalasok = reservation.selectByGuestName(null, 1, false);
            dg_nevek.DataContext = foglalasok;
            dg_nevek.SelectedIndex = 0;
            dg_fogyasztas.DataContext = fogyasztasok;
            lb_itemek.DataContext = fogylehetoseg;
            tipusok = fogylehetoseg.Select(x => x.Type).Distinct().ToList();
            tipusok.Add("All");
            cb_typefilter.ItemsSource = tipusok;
            cb_typefilter.SelectedIndex = tipusok.Count - 1;
        }
        private void tb_guestinput_TextChanged(object sender, TextChangedEventArgs e)
        {
            foglalasok = reservation.selectByGuestName(tb_guestinput.Text, 1, false);
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
                string valasztottnev = ((StackPanel)sender).Tag.ToString();
                storage valasztottitem = storage.selectClickedItem(valasztottnev)[0];
                reservation valasztottRes = (reservation)dg_nevek.SelectedItem;
                int id = valasztottRes.ReservationID;
                consumption.insert(new consumption(valasztottitem.Price, valasztottnev, id));
                fogyasztasok = consumption.selectItemByReservationID(id);
                dg_fogyasztas.DataContext = fogyasztasok;
                arfrissit(id);
                log.callInsertIntoLog("admin","Added consumption","Reservation",valasztottres.ReservationID);
            }
        }

        private void btn_eltavolit_Click(object sender, RoutedEventArgs e)
        {
            if (dg_fogyasztas.SelectedItem!=null)
            {
                consumption valasztott = (consumption)dg_fogyasztas.SelectedItem;
                int id = valasztott.ConsumptionID;
                consumption.delete(id);
                reservation valasztottres = (reservation)dg_nevek.SelectedItem;
                int id2 = valasztottres.ReservationID;
                log.callInsertIntoLog("admin", "Deleted consumption", "Reservation", valasztottres.ReservationID);
                fogyasztasok = consumption.selectItemByReservationID(id2);
                dg_fogyasztas.DataContext = fogyasztasok;
                arfrissit(id2);
            }
        }

        private void dg_nevek_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            if (dg_nevek.SelectedIndex != -1)
            {
                valasztottres = (reservation)dg_nevek.SelectedItem;
                int id = valasztottres.ReservationID;
                fogyasztasok = consumption.selectItemByReservationID(id);
                dg_fogyasztas.DataContext = fogyasztasok;
                arfrissit(id);
            }
        }
        private void arfrissit(int id)
        {
            if (consumption.selectSumByID(id).Count != 0)
            {
                string osszeg = consumption.selectSumByID(id)[0].osszeg.ToString("F");
                lbl_osszeg.Content = string.Format("Price: $" + osszeg);
            }
            else
            {
                lbl_osszeg.Content = string.Format("Price: $0");
            }
        }

        private void cb_typefilter_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            fogylehetoseg = storage.selectByType(cb_typefilter.SelectedItem.ToString());              
            lb_itemek.DataContext = fogylehetoseg;
        }

        private void btn_uj_Click(object sender, RoutedEventArgs e)
        {
            storage valasztott = new storage();
            var itemadd = new ComsumptionAdd(valasztott);
            itemadd.ShowDialog();
        }

        private void btn_edit_Click(object sender, RoutedEventArgs e)
        {
            var modositasablak = new editcons();
            if (modositasablak.ShowDialog() == true)
            {
                fogylehetoseg = storage.selectByType(cb_typefilter.SelectedItem.ToString());
                lb_itemek.DataContext = fogylehetoseg;
            }
        }

    }
}
