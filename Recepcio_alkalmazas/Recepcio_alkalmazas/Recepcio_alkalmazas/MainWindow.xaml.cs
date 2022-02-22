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
using System.Windows.Threading;
using Recepcio_alkalmazas.Models;
using Recepcio_alkalmazas.Views;


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
            reset("erkezes");
            frm_main.Content = new guestarrives();
            DispatcherTimer LiveTime = new DispatcherTimer();
            LiveTime.Interval = TimeSpan.FromSeconds(1);
            LiveTime.Tick += timer_Tick;
            LiveTime.Start();
        }
        void timer_Tick(object sender, EventArgs e)
        {
            LiveDateLabel.Content = DateTime.Now.ToString("yyyy. MM. dd.");
            LiveTimeLabel.Content = DateTime.Now.ToString("HH:mm:ss");
        }
        private void reset(string melyikgomb)
        {
            btn_modosit.BorderBrush = btn_cashier.BorderBrush=btn_tavozas.BorderBrush = btn_erkezes.BorderBrush = btn_fogyasztás.BorderBrush=btn_reportok.BorderBrush = Brushes.Black;
            switch (melyikgomb)
            {
                case "tavozas":
                    btn_tavozas.BorderBrush = Brushes.DarkGoldenrod;
                    break;
                case "erkezes":
                    btn_erkezes.BorderBrush = Brushes.DarkGoldenrod;
                    break;
                case "modify":
                    btn_modosit.BorderBrush = Brushes.DarkGoldenrod;
                    break;
                case "fogyasztas":
                    btn_fogyasztás.BorderBrush = Brushes.DarkGoldenrod;
                    break;
                case "cash":
                    btn_cashier.BorderBrush = Brushes.DarkGoldenrod;
                    break;
                case "reports":
                    btn_reportok.BorderBrush = Brushes.DarkGoldenrod;
                    break;
                default:
                    break;
            }
        }
        private void btn_tavozas_Click(object sender, RoutedEventArgs e)
        {
            reset("tavozas");
            frm_main.Content = new guestleaves();
        }

        private void btn_fogyasztás_Click(object sender, RoutedEventArgs e)
        {
            reset("fogyasztas");
            frm_main.Content = new cons();

        }
        private void btn_modosit_Click(object sender, RoutedEventArgs e)
        {
            reset("modify");
            frm_main.Content = new editreservation();
        }

        private void btn_erkezes_Click(object sender, RoutedEventArgs e)
        {
            reset("erkezes");
            frm_main.Content = new guestarrives();
        }
        private void btn_cashier_Click(object sender, RoutedEventArgs e)
        {
            reset("cash");
            frm_main.Content = new logs();
        }
        private void btn_close_Click(object sender, RoutedEventArgs e)
        {
            this.Close();
        }

        private void btn_fullscreen_Click(object sender, RoutedEventArgs e)
        {
            if (Application.Current.MainWindow.WindowState != WindowState.Maximized)
            {
                Application.Current.MainWindow.WindowState = WindowState.Maximized;
            }
            else
                Application.Current.MainWindow.WindowState = WindowState.Normal;
        }

        private void btn_mini_Click(object sender, RoutedEventArgs e)
        {
            Application.Current.MainWindow.WindowState = WindowState.Minimized;
        }

        private void Grid_MouseDown(object sender, MouseButtonEventArgs e)
        {
            if (e.LeftButton == MouseButtonState.Pressed)
            {
                DragMove();
            }
        }
        private void btn_reportok_Click(object sender, RoutedEventArgs e)
        {
            reset("reports");
           frm_main.Content = new reports();
        }
    }
}
