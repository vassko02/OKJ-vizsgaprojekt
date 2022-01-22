using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;
using System.Collections.ObjectModel;

namespace Recepcio_alkalmazas.Models
{
    public class consumption
    {
        public int ConsumptionID { get; set; }
        public double Price { get; set; }
        public string ItemName { get; set; }
        public int ReservationID { get; set; }
        public double osszeg { get; set; }
        public consumption() { }
        public consumption(MySqlDataReader reader)
        {
            this.ConsumptionID = Convert.ToInt32(reader["ConsumptionID"]);
            this.Price = Convert.ToDouble(reader["Price"]);
            this.ItemName = reader["ItemName"].ToString();
            this.ReservationID = Convert.ToInt32(reader["ReservationID"]);
        }
        public consumption(double p, string i, int resid)
        {
            this.Price = p;
            this.ItemName = i;
            this.ReservationID = resid;
        }
        public static int insert(consumption model)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "INSERT INTO consumption (Price,ItemName,ReservationID) VALUES " +
                    "(@Price,@ItemName,@ReservationID)";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@Price", model.Price);
                    cmd.Parameters.AddWithValue("@ItemName", model.ItemName);
                    cmd.Parameters.AddWithValue("@ReservationID", model.ReservationID);
                    cmd.ExecuteNonQuery();
                    return (int)cmd.LastInsertedId;
                }
            }
        }
        public static ObservableCollection<consumption> selectItemByReservationID(int id)
        {
            var lista = new ObservableCollection<consumption>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select * from consumption inner join reservation on consumption.ReservationID=reservation.reservationID where 1=1";
                sql += " AND reservation.ReservationID LIKE @id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new consumption(reader));
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
                var sql = "DELETE FROM consumption WHERE ConsumptionID=@id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    cmd.ExecuteNonQuery();
                }
                con.Close();
            }
        }
        public static void deleteBYREsID(int id)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "DELETE FROM consumption WHERE ReservationID=@id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    cmd.ExecuteNonQuery();
                }
                con.Close();
            }
        }
        public static ObservableCollection<consumption> selectSumByID(int id)
        {
            var lista = new ObservableCollection<consumption>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT SUM(consumption.Price) as osszeg FROM consumption WHERE consumption.ReservationID = @id GROUP BY consumption.ReservationID";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new consumption()
                            {
                                osszeg = Convert.ToDouble(reader["osszeg"])
                            }
                                );
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}