using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;
using System.Collections.ObjectModel;

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
        public static ObservableCollection<room> selectAllRooms()
        {
            var lista = new ObservableCollection<room>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT * from room";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new room(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}
