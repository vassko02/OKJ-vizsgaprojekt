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

        }
    }
}
