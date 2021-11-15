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

namespace Recepcio_alkalmazas.pages
{
    /// <summary>
    /// Interaction logic for guestarrives.xaml
    /// </summary>
    public partial class guestarrives : Page
    {

        List<foglalas> foglalasok = new List<foglalas>();
        List<string> filterednevek = new List<string>();
        foglalas ujfoglalas = new foglalas();
        public guestarrives()
        {
            InitializeComponent();
            foglalasokbeolvasasa("foglalas.txt");
            vendeknevbetolt();
            lb_guests.DataContext = filterednevek;
            sp_adatok.DataContext = ujfoglalas;
            lb_guests.SelectedItem = "";
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
            if (btn_keszpenz.IsChecked==false&&btn_kartya.IsChecked==false)
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
        private void vendeknevbetolt()
        {
            foreach (var item in foglalasok)
            {
                filterednevek.Add(item.guestname);
            }
            filterednevek.Sort();
        }

        private void foglalasokbeolvasasa(string fajlnev)
        {
            StreamReader sr = new StreamReader(fajlnev);
            do
            {
                foglalasok.Add(new foglalas(sr.ReadLine()));
            } while (!sr.EndOfStream);
            sr.Close();
        }
        private void tb_guestinput_TextChanged(object sender, TextChangedEventArgs e)
        {
            string input = tb_guestinput.Text.ToLower();
            filterednevek.Clear();
            foreach (var item in foglalasok)
            {
                if (item.guestname.ToLower().Contains(input))
                {
                    filterednevek.Add(item.guestname);
                }
            }
            filterednevek.Sort();
            lb_guests.Items.Refresh();
        }

        private void lb_guests_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {

            foreach (var item in foglalasok)
            {
                if (lb_guests.SelectedItem.ToString() == item.guestname)
                {
                    ujfoglalas.guestname = item.guestname;
                    ujfoglalas.IDnumber = item.IDnumber;
                    ujfoglalas.arrivedate = item.arrivedate;
                    ujfoglalas.LeaveDate = item.LeaveDate;
                    ujfoglalas.guestnumber = item.guestnumber;
                    ujfoglalas.childrennumber = item.childrennumber;
                    ujfoglalas.adoultnumber = item.adoultnumber;
                    ujfoglalas.servicetype = item.servicetype;
                    ujfoglalas.roomtype = item.roomtype;
                    ujfoglalas.price = item.price;
                    ujfoglalas.phone = item.phone;
                }
            }
        }
    }
}
