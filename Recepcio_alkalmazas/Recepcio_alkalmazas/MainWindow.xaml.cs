﻿using System;
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

namespace Recepcio_alkalmazas
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window, INotifyPropertyChanged
    {
        List<foglalas> foglalasok = new List<foglalas>();
        List<string> vendegnevek = new List<string>();
        List<string> filterednevek = new List<string>();
        public event PropertyChangedEventHandler PropertyChanged;
        public MainWindow()
        {
            InitializeComponent();
            foglalasokbeolvasasa("foglalas.txt");
            vendeknevbetolt();
            lb_guests.DataContext = filterednevek;
        }

        private void vendeknevbetolt()
        {
            foreach (var item in foglalasok)
            {
                vendegnevek.Add(item.guestname);
            }
            foreach (var item in foglalasok)
            {
                filterednevek.Add(item.guestname);
            }
        }

        private void foglalasokbeolvasasa(string fajlnev)
        {
            StreamReader sr = new StreamReader(fajlnev);
            do
            {
                foglalasok.Add(new foglalas(sr.ReadLine()));
            } while (!sr.EndOfStream);
            sr.Close();
        }

        private void btn_tavozas_Click(object sender, RoutedEventArgs e)
        {
            guestleave leave = new guestleave();
            leave.Show();
            this.Close();
        }

        private void btn_fogyasztás_Click(object sender, RoutedEventArgs e)
        {
            consumption cons = new consumption();
            cons.Show();
            this.Close();
        }

        private void btn_fizetes_Click(object sender, RoutedEventArgs e)
        {
            reciept rec = new reciept();
            rec.Show();
            this.Close();
        }

        private void btn_modosit_Click(object sender, RoutedEventArgs e)
        {
            edit ed = new edit();
            ed.Show();
            this.Close();
        }

        private void tb_guestinput_TextChanged(object sender, TextChangedEventArgs e)
        {
            string input=tb_guestinput.Text.ToLower();
            //for (int i = 0; i < foglalasok.Count; i++)
            //{
            //    if (!filterednevek[i].Contains(input))
            //    {
            //        filterednevek.RemoveAt(i);
            //        break;
            //    }
            //    if (filterednevek[i].Contains(input)&&!filterednevek.Contains(foglalasok[i].guestname))
            //    {
            //        filterednevek.Add(foglalasok[i].guestname);
            //    }
            //}
            filterednevek.Clear();
            foreach (var item in foglalasok)
            {
                if (item.guestname.ToLower().Contains(input))
                {
                    filterednevek.Add(item.guestname);
                }
            }
            lb_guests.Items.Refresh();
        }
    }
}
