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
using Recepcio_alkalmazas.Models;

namespace Recepcio_alkalmazas.Views
{
    /// <summary>
    /// Interaction logic for editcons.xaml
    /// </summary>
    public partial class editcons : Window
    {
        ObservableCollection<storage> fogylehetoseg = new ObservableCollection<storage>();
        List<string> tipusok = new List<string>();
        List<string> nevek = new List<string>();
        storage valasztott = new storage();
        public editcons()
        {
            InitializeComponent();
            fogylehetoseg = storage.select();
            tipusok = fogylehetoseg.Select(x => x.Type).Distinct().ToList();
            nevek = fogylehetoseg.Select(x => x.ItemName).ToList();
            cb_types.ItemsSource = tipusok;
            cb_types.SelectedIndex = 0;
            cb_items.ItemsSource = nevek;
            cb_items.SelectedIndex = 0;
            sp_data.DataContext = valasztott;
            cb_tipusok.ItemsSource = tipusok;
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
            if (tb_name.Text=="" || tb_price.Text == "")
            {
                MessageBox.Show("Incorrect data!", "Error", MessageBoxButton.OK, MessageBoxImage.Error);
                return;
            }
            storage.update(valasztott);
            DialogResult = true;
        }

        private void cb_types_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            fogylehetoseg = storage.selectByType(cb_types.SelectedItem.ToString());
            nevek = fogylehetoseg.Select(x => x.ItemName).ToList();
            cb_items.ItemsSource = nevek;
            cb_items.SelectedIndex = 0;
            valasztott = storage.selectByName(cb_items.SelectedItem.ToString())[0];
        }

        private void cb_items_SelectionChanged(object sender, SelectionChangedEventArgs e)
        {
            if (cb_items.SelectedItem!=null)
            {
                valasztott = storage.selectByName(cb_items.SelectedItem.ToString())[0];
                sp_data.DataContext = valasztott;
            }
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
