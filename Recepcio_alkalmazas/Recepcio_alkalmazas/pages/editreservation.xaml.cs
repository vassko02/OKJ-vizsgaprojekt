﻿using System;
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
using System.IO;
using System.Windows.Shapes;

namespace Recepcio_alkalmazas.pages
{
    /// <summary>
    /// Interaction logic for editreservation.xaml
    /// </summary>
    public partial class editreservation : Page
    {
        List<string> filterednevek = new List<string>();
        List<foglalas> foglalasok = new List<foglalas>();
        List<string> vendegnevek = new List<string>();
        foglalas ujfoglalas = new foglalas();
        public editreservation()
        {
            InitializeComponent();
            foglalasokbeolvasasa("foglalas.txt");
            vendeknevbetolt();
            lb_guests.DataContext = filterednevek;
            sp_jobb.DataContext = ujfoglalas;
            lb_guests.SelectedItem = "";
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
            filterednevek.Sort();

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
    private void tb_guestinput_TextChanged(object sender, TextChangedEventArgs e)
    {
        string input = tb_guestinput.Text.ToLower();
        filterednevek.Clear();
        foreach (var item in foglalasok)
        {
            if (item.guestname.ToLower().Contains(input))
            {
                filterednevek.Add(item.guestname);
            }
        }
        filterednevek.Sort();
        lb_guests.Items.Refresh();
    }

    private void lb_guests_SelectionChanged(object sender, SelectionChangedEventArgs e)
    {
        if (!(lb_guests.Items.Count > 0))
        {
            return;
        }
        string valasztott = lb_guests.SelectedItem.ToString();

        foreach (var item in foglalasok)
        {
            if (item.guestname == valasztott)
            {
                ujfoglalas.guestname = valasztott;
                ujfoglalas.IDnumber = item.IDnumber;
                ujfoglalas.arrivedate = item.arrivedate;
                ujfoglalas.LeaveDate = item.LeaveDate;
                ujfoglalas.guestnumber = item.guestnumber;
                ujfoglalas.childrennumber = item.childrennumber;
                ujfoglalas.adoultnumber = item.adoultnumber;
                ujfoglalas.servicetype = item.servicetype;
                ujfoglalas.roomtype = item.roomtype;
                ujfoglalas.price = item.price;
                ujfoglalas.phone = item.phone;
            }
        }
    }
}
}
