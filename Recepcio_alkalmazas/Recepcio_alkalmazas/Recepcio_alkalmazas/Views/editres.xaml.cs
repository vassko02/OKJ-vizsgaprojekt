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
using System.Collections.ObjectModel;
using Recepcio_alkalmazas.Models;
using System.Linq;

namespace Recepcio_alkalmazas.Views
{
    /// <summary>
    /// Interaction logic for editres.xaml
    /// </summary>
    public partial class editres : Window
    {
        public reservation egyfoglalas { get; private set; }
        List<servicetype> tipusok = new List<servicetype>();
        ObservableCollection<room> szobak = new ObservableCollection<room>();
        public editres(reservation model)
        {
            InitializeComponent();
            egyfoglalas = model;
            szobak = room.selectAllRooms();
            this.DataContext = egyfoglalas;
            tipusok = servicetype.selectAllNames();
            cb_services.ItemsSource = tipusok;
            cb_rooms.ItemsSource = szobak.Select(x=>x.RoomName).Distinct();
            foreach (var item in szobak)
            {
                if (item.RoomName==egyfoglalas.RoomName)
                {
                    cb_rooms.SelectedItem = item.RoomName;
                }
            }
            
        }
        private void btn_save_Click(object sender, RoutedEventArgs e)
        {
            //adatok mentése
            this.Close();
        }
        private void btn_cancel_Click(object sender, RoutedEventArgs e)
        {
            this.Close();
        }

        private void Grid_MouseDown(object sender, MouseButtonEventArgs e)
        {
            if (e.LeftButton == MouseButtonState.Pressed)
            {
                DragMove();
            }
        }
    }
}
