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
    /// Interaction logic for guestleave.xaml
    /// </summary>
    public partial class guestleave : Window
    {
        public guestleave()
        {
            InitializeComponent();
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

        private void btn_erkezes_Click(object sender, RoutedEventArgs e)
        {
            MainWindow main = new MainWindow();
            main.Show();
            this.Close();
        }
    }
}
