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

namespace Recepcio_alkalmazas.Views
{
    /// <summary>
    /// Interaction logic for reports.xaml
    /// </summary>
    public partial class reports : Page
    {
        public reports()
        {
            InitializeComponent();
            btn_reportok.BorderBrush = Brushes.DarkGoldenrod;
            frm_content.Content = new ReportPage();
        }

        private void btn_ratings_Click(object sender, RoutedEventArgs e)
        {
            frm_content.Content = new RatingPage();
            btn_reportok.BorderBrush = Brushes.DarkGray;
            btn_ratings.BorderBrush = Brushes.DarkGoldenrod;
        }

        private void btn_reportok_Click(object sender, RoutedEventArgs e)
        {
            frm_content.Content = new ReportPage();
            btn_ratings.BorderBrush = Brushes.DarkGray;
            btn_reportok.BorderBrush = Brushes.DarkGoldenrod;

        }
    }
}
