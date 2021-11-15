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
    /// Interaction logic for guestleaves.xaml
    /// </summary>
    public partial class guestleaves : Page
    {
        List<string> filterednevek = new List<string>();
        List<foglalas> foglalasok = new List<foglalas>();
        List<string> vendegnevek = new List<string>();
        public guestleaves()
        {
            InitializeComponent();
            foglalasokbeolvasasa("foglalas.txt");
            vendeknevbetolt();
            lb_guests.DataContext = filterednevek;
            lb_guests.SelectedItem = "";
        }
        private void vendeknevbetolt()
        {
            foreach (var item in foglalasok)
            {
                vendegnevek.Add(item.guestname);
            }
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

        private void btn_keszpenz_Click(object sender, RoutedEventArgs e)
        {
            if (btn_keszpenz.IsChecked==true)
            {
                btn_kartya.IsChecked = false;
            }
            else
            {
                btn_kartya.IsEnabled = true;
            }
        }

        private void btn_kartya_Click(object sender, RoutedEventArgs e)
        {
            if (btn_keszpenz.IsChecked == true)
            {
                btn_keszpenz.IsChecked = false;
            }
            else
            {
                btn_keszpenz.IsEnabled = true;
            }
        }
    }
}
