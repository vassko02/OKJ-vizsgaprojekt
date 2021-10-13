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
using System.Windows.Shapes;

namespace Recepcio_alkalmazas
{
    /// <summary>
    /// Interaction logic for consumption.xaml
    /// </summary>
    public partial class consumption : Window
    {
        Dictionary<string, double> lehetosegek = new Dictionary<string, double>();

        public consumption()
        {
            InitializeComponent();
            italfeltolt();
        }

        private void italfeltolt()
        {
            lehetosegek.Add("Coca-Cola",1.5);
            lehetosegek.Add("Fanta", 1.5);
            lehetosegek.Add("Sprite", 1.5);
            lehetosegek.Add("Natur Aqua", 1.5);
            lehetosegek.Add("Kinley", 1.5);
            lehetosegek.Add("Cappy", 1.5);
            lehetosegek.Add("Aperol spritz", 5.99);
            lehetosegek.Add("Bloody Mary", 9.99);
            lehetosegek.Add("Cosmopolian", 7.99);
            lehetosegek.Add("Gin Fizz", 6.99);
            lehetosegek.Add("Long Island Ice Tea", 8.99);
            lehetosegek.Add("Margarita", 8.99);
            lehetosegek.Add("Mojito", 9.99);
            lehetosegek.Add("Pina colada", 7.49);
            lehetosegek.Add("Zombie", 10.49);
            lehetosegek.Add("Massage", 14.99);
            lehetosegek.Add("Hairdresser", 22.99);
            lehetosegek.Add("Billiard", 15.99);
            lehetosegek.Add("Bowling", 14.99);
            lehetosegek.Add("Tennis", 16.99);
            lehetosegek.Add("Breakfast in bead", 8.99);
        }
        private void btn_tavozas_Click(object sender, RoutedEventArgs e)
        {
            guestleave leave = new guestleave();
            leave.Show();
            this.Close();
        }

        private void btn_fizetes_Click(object sender, RoutedEventArgs e)
        {
            reciept rec = new reciept();
            rec.Show();
            this.Close();
        }

        private void btn_erkezes_Click(object sender, RoutedEventArgs e)
        {
            MainWindow main = new MainWindow();
            main.Show();
            this.Close();
        }

        private void btn_modosit_Click(object sender, RoutedEventArgs e)
        {
            edit ed = new edit();
            ed.Show();
            this.Close();
        }
    }
}
