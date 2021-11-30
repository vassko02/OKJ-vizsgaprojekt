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

namespace Recepcio_alkalmazas.pages
{
    /// <summary>
    /// Interaction logic for editreservation.xaml
    /// </summary>
    public partial class editreservation : Page
    {
        List<string> filterednevek = new List<string>();
        List<foglalas> foglalasok = new List<foglalas>();
        List<string> vendegnevek = new List<string>();
        foglalas ujfoglalas = new foglalas();
        public editreservation()
        {
            InitializeComponent();
            foglalasokbeolvasasa("foglalas.txt");
            vendeknevbetolt();
            sp_jobb.DataContext = ujfoglalas;
            dg_foglalasok.DataContext = foglalasok;
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
        }
    }
}
