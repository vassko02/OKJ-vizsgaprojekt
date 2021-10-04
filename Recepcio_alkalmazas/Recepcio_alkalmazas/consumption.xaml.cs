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
        Dictionary<string, double> italok = new Dictionary<string, double>();
        public consumption()
        {
            InitializeComponent();
            italfeltolt();
        }

        private void italfeltolt()
        {
            italok.Add("Coca-Cola",1.5);
            italok.Add("Fanta", 1.5);
            italok.Add("Sprite", 1.5);
            italok.Add("Natur Aqua", 1.5);
            italok.Add("Kinley", 1.5);
            italok.Add("Cappy", 1.5);
            italok.Add("Aperol spritz", 5.99);
            italok.Add("Bloody Mary", 9.99);
            italok.Add("Cosmopolian", 7.99);
            italok.Add("Gin Fizz", 6.99);
            italok.Add("Long Island Ice Tea", 8.99);
            italok.Add("Margarita", 8.99);
            italok.Add("Mojito", 9.99);
            italok.Add("Pina colada", 7.49);
            italok.Add("Zombie", 10.49);

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
