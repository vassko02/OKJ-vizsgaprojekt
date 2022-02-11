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
        ObservableCollection<reservationLog> ResLogs = new ObservableCollection<reservationLog>();
        ObservableCollection<userLog> UserLogs = new ObservableCollection<userLog>();

        public logs()
        {
            InitializeComponent();
            ResLogs = reservationLog.selectreservationLog();
            UserLogs = userLog.selectuserlog();
            dg_reslog.DataContext = ResLogs;
            dg_userlog.DataContext = UserLogs;

            //log.callInsertIntoLog("teszt","Wpf","User");
        }
    }
}
