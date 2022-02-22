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
    /// Interaction logic for REsLogPage.xaml
    /// </summary>
    public partial class REsLogPage : Page
    {
        ObservableCollection<reservationLog> logitems = new ObservableCollection<reservationLog>();

        public REsLogPage()
        {
            InitializeComponent();
            logitems = reservationLog.selectreservationLog();
            dg_ratings.ItemsSource = logitems;
        }
    }
}
