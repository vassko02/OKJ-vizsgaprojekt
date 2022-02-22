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
using System.Windows.Shapes;
using System.IO;
using Recepcio_alkalmazas.Models;
using System.Collections.ObjectModel;
using System.Text.RegularExpressions;

namespace Recepcio_alkalmazas.Views
{
    /// <summary>
    /// Interaction logic for logs.xaml
    /// </summary>
    public partial class logs : Page
    {


        public logs()
        {
            InitializeComponent();
            btn_reslog.BorderBrush = Brushes.DarkGoldenrod;
            frm_content.Content = new REsLogPage();
        }

        private void btn_reslog_Click(object sender, RoutedEventArgs e)
        {
            btn_userlog.BorderBrush = Brushes.DarkGray;
            btn_reslog.BorderBrush = Brushes.DarkGoldenrod;
            frm_content.Content = new REsLogPage();
        }

        private void btn_userlog_Click(object sender, RoutedEventArgs e)
        {
            btn_reslog.BorderBrush = Brushes.DarkGray;
            btn_userlog.BorderBrush = Brushes.DarkGoldenrod;
            frm_content.Content = new userLogPage();
        }
    }
}
