using System;
using System.Collections.Generic;
using System.Text;
using MySql.Data.MySqlClient;
using System.Configuration;
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
        public string Name { get; set; }
        public string PhoneNumber { get; set; }
        public string IDNumber { get; set; }
        public string RoomName { get; set; }
        public string ServiceType { get; set; }


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
            this.Name = reader["Name"].ToString();
            this.PhoneNumber = reader["PhoneNumber"].ToString();
            this.IDNumber = reader["IDNumber"].ToString();
            this.RoomName = reader["RoomName"].ToString();
            this.ServiceType = reader["ServiceType"].ToString();
        }
        public static List<reservation> selectByGuestName(string name)
        {
            var lista = new List<reservation>();
            using (var con= new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT reservation.*,customer.Name,customer.PhoneNumber,customer.IDNumber,room.RoomName,servicetype.ServiceType " +
                    "FROM reservation INNER JOIN customer ON reservation.CustomerID=customer.CustomerID "+
                    "join room ON `reservation`.`RoomID` = room.RoomID " +
                    "join servicetype ON `reservation`.ServiceID = servicetype.ServiceID Where 1=1";
                if (!string.IsNullOrEmpty(name))
                {
                    sql += " AND customer.Name LIKE @name";
                }
                sql += " ORDER BY customer.Name";
                using (var cmd = new MySqlCommand(sql,con))
                {
                    cmd.Parameters.AddWithValue("@name","%"+name+"%");
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new reservation(reader));
                        }
                    }
                }
            con.Close();
            }
            return lista;
        }
        public static void delete(int id)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "DELETE FROM reservation WHERE ReservationID=@id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    cmd.ExecuteNonQuery();
                }
                con.Close();
            }
        }
    }
}
