using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
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
using System.ComponentModel;
using System.Collections.ObjectModel;

namespace Recepcio_alkalmazas
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        List<foglalas> foglalasok = new List<foglalas>();
        List<string> vendegnevek = new List<string>();
        List<string> filterednevek = new List<string>();
        public MainWindow()
        {
            InitializeComponent();
            foglalasokbeolvasasa("foglalas.txt");
            vendeknevbetolt();
            lb_guests.DataContext = filterednevek;
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

        private void btn_tavozas_Click(object sender, RoutedEventArgs e)
        {
            guestleave leave = new guestleave();
            leave.Show();
            this.Close();
        }

        private void btn_fogyasztás_Click(object sender, RoutedEventArgs e)
        {
            consumption cons = new consumption();
            cons.Show();
            this.Close();
        }

        private void btn_fizetes_Click(object sender, RoutedEventArgs e)
        {
            reciept rec = new reciept();
            rec.Show();
            this.Close();
        }

        private void btn_modosit_Click(object sender, RoutedEventArgs e)
        {
            edit ed = new edit();
            ed.Show();
            this.Close();
        }

        private void tb_guestinput_TextChanged(object sender, TextChangedEventArgs e)
        {
            string input=tb_guestinput.Text.ToLower();
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
                if (item.guestname==lb_guests.SelectedItem.ToString())
                {
                    lbl_guest.Content = item.guestname.ToString();
                    lbl_id.Content = item.IDnumber.ToString();
                    lbl_phone.Content = item.phone.ToString();
                    lbl_arrive.Content = item.arrivedate.ToString();
                    lbl_leave.Content = item.LeaveDate.ToString(); 
                    lbl_guestnumber.Content = item.guestnumber.ToString();
                    lbl_childnumber.Content = item.childrennumber.ToString(); 
                    lbl_adultnumber.Content = item.adoultnumber.ToString();
                    lbl_service.Content = item.servicetype.ToString();
                    lbl_room.Content = item.roomtype.ToString();
                    lbl_price.Content = item.price.ToString();
                }
            }
        }
    }
}
