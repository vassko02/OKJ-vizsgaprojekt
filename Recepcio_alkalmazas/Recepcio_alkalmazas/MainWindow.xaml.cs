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

namespace Recepcio_alkalmazas
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
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
    }
}
