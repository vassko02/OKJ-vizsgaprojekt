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
        public consumption(double p,string i,int resid)
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
    }
}