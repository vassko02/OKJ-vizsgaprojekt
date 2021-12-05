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
using Recepcio_alkalmazas.Models;

namespace Recepcio_alkalmazas.Views
{
    /// <summary>
    /// Interaction logic for cashreg.xaml
    /// </summary>
    public partial class cashreg : Page
    {
        List<cashregister> bevetek = new List<cashregister>();
        public cashreg()
        {
            InitializeComponent();
            bevetek = cashregister.select();
            dg_adatok.ItemsSource = bevetek;
        }
    }
}
