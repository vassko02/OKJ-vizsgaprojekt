using Recepcio_alkalmazas.Models;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.Text;
using System.Text.RegularExpressions;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;

namespace Recepcio_alkalmazas.Views
{
    /// <summary>
    /// Interaction logic for ComsumptionAdd.xaml
    /// </summary>
    public partial class ComsumptionAdd : Window
    {
        storage item = new storage();
        List<string> tipusok = new List<string>();
        ObservableCollection<storage> fogylehetoseg = new ObservableCollection<storage>();
        public ComsumptionAdd(storage model)
        {
            InitializeComponent();
            item = model;
            this.DataContext = item;
            fogylehetoseg = storage.select();
            tipusok = fogylehetoseg.Select(x => x.Type).Distinct().ToList();
            cb_type.ItemsSource = tipusok;
        }
        private void Grid_MouseDown(object sender, MouseButtonEventArgs e)
        {
            if (e.LeftButton == MouseButtonState.Pressed)
            {
                DragMove();
            }
        }

        private void btn_cancel_Click(object sender, RoutedEventArgs e)
        {
            DialogResult = false;
        }

        private void btn_save_Click(object sender, RoutedEventArgs e)
        {
            if (tb_price.Text==""||double.Parse(tb_price.Text)==0||cb_type.SelectedItem==null||tb_name.Text=="")
            {
                MessageBox.Show("Incorrect data!","Error",MessageBoxButton.OK,MessageBoxImage.Error);
                return;
            }
            storage.insert(item);
            DialogResult = true;
        }
        private static readonly Regex _regex = new Regex("[^0-9.]"); //regex that matches disallowed text
        private static bool IsTextAllowed(string text)
        {
            return !_regex.IsMatch(text);
        }
        private void tb_price_PreviewTextInput(object sender, TextCompositionEventArgs e)
        {
            e.Handled = !IsTextAllowed(e.Text);
        }
    }
}
