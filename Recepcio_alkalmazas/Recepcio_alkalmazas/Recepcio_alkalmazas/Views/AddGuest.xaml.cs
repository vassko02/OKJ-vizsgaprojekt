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
using Recepcio_alkalmazas.Models;

namespace Recepcio_alkalmazas.Views
{
    /// <summary>
    /// Interaction logic for AddGuest.xaml
    /// </summary>
    public partial class AddGuest : Window
    {
        customer ujguest = new customer();
        public AddGuest()
        {
            InitializeComponent();
            this.DataContext = ujguest;
        }
        private void btn_save_Click(object sender, RoutedEventArgs e)
        {
            if (customer.selectGuestsByEmail(tb_email.Text).Count!=0)
            {
                MessageBox.Show("This email address is already used!", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
                return;
            }
            if (tb_email.Text==""|| tb_guestname.Text == "" || tb_phonenumber.Text == "" ||!tb_email.Text.Contains("@"))
            {
                MessageBox.Show("Incorrect data!", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
                return;
            }
            customer.insert(ujguest);
            DialogResult = true;
            this.Close();
        }
        private void btn_cancel_Click(object sender, RoutedEventArgs e)
        {
            DialogResult = false;
            this.Close();
        }
    }
}
