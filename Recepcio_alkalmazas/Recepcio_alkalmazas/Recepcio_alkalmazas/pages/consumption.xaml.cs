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

namespace Recepcio_alkalmazas.pages
{
    /// <summary>
    /// Interaction logic for consumption.xaml
    /// </summary>
    public partial class consumption : Page
    {
        ObservableCollection<foglalas> foglalasok = new ObservableCollection<foglalas>();
        Dictionary<string, double> lehetosegek = new Dictionary<string, double>();
        List<string> filterednevek = new List<string>();
        foglalas ujfoglalas = new foglalas();
        ObservableCollection<fogyasztas> fogyasztasok = new ObservableCollection<fogyasztas>();
        ObservableCollection<fogyasztas> valasztottembere = new ObservableCollection<fogyasztas>();
        public consumption()
        {
            InitializeComponent();
            italfeltolt();
            foglalasokbeolvasasa("foglalas.txt");
            vendeknevbetolt();
            lb_guests.DataContext = filterednevek;
            lb_guests.SelectedItem = "";
            lb_fogyasztasok.DataContext = valasztottembere;
            fogyasztasok.Add(new fogyasztas("qwe", "Coca-Cola", 1.49));
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
        private void lb_guests_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            valasztottembere.Clear();
            lb_fogyasztasok.Items.Refresh();
            foreach (var item in fogyasztasok)
            {
                if (item.guestname == lb_guests.SelectedItem.ToString())
                {
                    valasztottembere.Add(new fogyasztas(item.guestname, item.itemname, item.price));
                }
            }
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
        private void StackPanel_MouseUp(object sender, MouseButtonEventArgs e)
        {
            string valasztottitem = ((StackPanel)sender).Tag.ToString();
            double itemar = 0;
            foreach (var item in lehetosegek)
            {
                if (item.Key == valasztottitem)
                {
                    itemar = item.Value;
                }
            }
            valasztottembere.Add(new fogyasztas(lb_guests.SelectedItem.ToString(), valasztottitem, itemar));
            fogyasztasok.Add(new fogyasztas(lb_guests.SelectedItem.ToString(), valasztottitem, itemar));
            lb_fogyasztasok.Items.Refresh();
        }

        private void btn_eltavolit_Click(object sender, RoutedEventArgs e)
        {
            
        }
    }
}
