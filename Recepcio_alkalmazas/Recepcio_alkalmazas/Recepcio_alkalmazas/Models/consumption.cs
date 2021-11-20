using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;

namespace Recepcio_alkalmazas.Models
{
    public class consumption
    {
        public int ConsumptionID { get; set; }
        public double price { get; set; }
        public string ItemName { get; set; }
        public int ReservationID { get; set; }
        public consumption() { }
        public consumption(MySqlDataReader reader)
        {

        }
    }
}