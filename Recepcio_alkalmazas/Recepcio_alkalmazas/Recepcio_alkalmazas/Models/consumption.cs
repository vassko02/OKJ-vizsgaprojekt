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
        public double Price { get; set; }
        public string ItemName { get; set; }
        public int ReservationID { get; set; }
        public consumption() { }
        public consumption(MySqlDataReader reader)
        {
            this.ConsumptionID = Convert.ToInt32(reader["ConsumptionID"]);
            this.Price = Convert.ToDouble(reader["Price"]);
            this.ItemName = reader["ItemName"].ToString();
            this.ReservationID = Convert.ToInt32(reader["ReservationID"]);
        }
    }
}