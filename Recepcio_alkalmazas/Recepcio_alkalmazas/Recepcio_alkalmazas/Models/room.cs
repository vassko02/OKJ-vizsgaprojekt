using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;

namespace Recepcio_alkalmazas.Models
{
    public class room
    {
        public int RoomID { get; set; }
        public string RoomName { get; set; }
        public int Capacity { get; set; }
        public string Description { get; set; }
        public double Price { get; set; }
        public room() { }
        public room(MySqlDataReader reader)
        {
            this.RoomID = Convert.ToInt32(reader["RoomID"]);
            this.RoomName = reader["RoomName"].ToString();
            this.Capacity = Convert.ToInt32(reader["Capacity"]);
            this.Description = reader["Description"].ToString();
            this.Price = Convert.ToDouble(reader["Price"]);
        }  
    }
}
