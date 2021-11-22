using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;
namespace Recepcio_alkalmazas.Models
{
    public class reservation
    {
        public int ReservationID { get; set; }
        public int GuestNumber { get; set; }
        public double Price { get; set; }
        public int Children { get; set; }
        public int Adults { get; set; }
        public DateTime ArrivalDate { get; set; }
        public DateTime LeavingDate { get; set; }
        public int CustomerID { get; set; }
        public int ServiceID { get; set; }
        public int RoomID { get; set; }
        public reservation() { }
        public reservation(MySqlDataReader reader)
        {
            this.ReservationID = Convert.ToInt32(reader["ReservationID"]);
            this.GuestNumber = Convert.ToInt32(reader["GuestNumber"]);
            this.Price = Convert.ToDouble(reader["Price"]);
            this.Children = Convert.ToInt32(reader["Children"]);
            this.Adults = Convert.ToInt32(reader["Adults"]);
            this.ArrivalDate = Convert.ToDateTime(reader["ArrivalDate"]);
            this.LeavingDate = Convert.ToDateTime(reader["LeavingDate"]);
            this.CustomerID = Convert.ToInt32(reader["CustomerID"]);
            this.ServiceID = Convert.ToInt32(reader["ServiceID"]);
            this.RoomID = Convert.ToInt32(reader["RoomID"]);
        }
    }
}
