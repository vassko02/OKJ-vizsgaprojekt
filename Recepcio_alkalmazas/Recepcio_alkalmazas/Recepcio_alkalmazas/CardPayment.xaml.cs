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
    /// Interaction logic for CardPayment.xaml
    /// </summary>
    public partial class CardPayment : Window
    {
        public CardPayment()
        {
            InitializeComponent();
        }

        private void btn_ok_Click(object sender, RoutedEventArgs e)
        {            
            DialogResult = true;
            this.Close();
        }

        private void btn_cancel_Click(object sender, RoutedEventArgs e)
        {
            DialogResult = false;
            Close();
        }

        private void PackIconMaterial_MouseUp(object sender, MouseButtonEventArgs e)
        {
            DialogResult = true;
            this.Close();
        }
    }
}
