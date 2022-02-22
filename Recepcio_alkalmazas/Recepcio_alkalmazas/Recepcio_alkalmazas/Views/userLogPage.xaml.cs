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
    /// Interaction logic for userLogPage.xaml
    /// </summary>
    public partial class userLogPage : Page
    {
        ObservableCollection<userLog> logitems = new ObservableCollection<userLog>();

        public userLogPage()
        {
            InitializeComponent();
            logitems = userLog.selectuserlog();
            dg_ratings.ItemsSource = logitems;
        }
    }
}
