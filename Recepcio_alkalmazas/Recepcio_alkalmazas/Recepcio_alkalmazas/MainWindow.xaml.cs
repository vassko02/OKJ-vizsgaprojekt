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
using Recepcio_alkalmazas.pages;

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
            frm_main.Content = new guestarrives();
        }
        private void btn_tavozas_Click(object sender, RoutedEventArgs e)
        {
            frm_main.Content = new guestleaves();

        }

        private void btn_fogyasztás_Click(object sender, RoutedEventArgs e)
        {
            frm_main.Content = new consumption();

        }
        private void btn_modosit_Click(object sender, RoutedEventArgs e)
        {
            frm_main.Content = new editreservation();
        }

        private void btn_erkezes_Click(object sender, RoutedEventArgs e)
        {
            frm_main.Content = new guestarrives();
        }

        private void btn_reciept_Click(object sender, RoutedEventArgs e)
        {
            frm_main.Content = new recipe();
        }

        private void btn_close_Click(object sender, RoutedEventArgs e)
        {
            this.Close();
        }

        private void btn_fullscreen_Click(object sender, RoutedEventArgs e)
        {
            if (Application.Current.MainWindow.WindowState != WindowState.Maximized) {
                Application.Current.MainWindow.WindowState=WindowState.Maximized; 
            }
            else
                Application.Current.MainWindow.WindowState = WindowState.Normal;
        }

        private void btn_mini_Click(object sender, RoutedEventArgs e)
        {
            Application.Current.MainWindow.WindowState= WindowState.Minimized;
        }

        private void Grid_MouseDown(object sender, MouseButtonEventArgs e)
        {
            if (e.LeftButton==MouseButtonState.Pressed)
            {
                DragMove();
            }
        }
    }
}
