using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;

namespace Recepcio_alkalmazas.Models
{
    public class customer
    {
        public int CustomerID { get; set; }
        public string Name { get; set; }
        public string PhoneNumber { get; set; }
        public string IDNumber { get; set; }
        public customer(){ }
        public customer(MySqlDataReader reader)
        {
            this.CustomerID = Convert.ToInt32(reader["CustomerID"]);
            this.Name = reader["Name"].ToString();
            this.PhoneNumber = reader["PhoneNumber"].ToString();
            this.IDNumber = reader["IDNumber"].ToString();
        }
        public static List<customer> selectGuestNameByResID(int id)
        {
            var lista = new List<customer>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select customer.Name from customer inner join reservation on customer.CustomerID=reservation.CustomerID where 1=1";
                sql += " AND reservation.ReservationID LIKE @id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            //lista.Add(new customer(reader));
                            lista.Add(new customer()
                            {
                                Name = reader["Name"].ToString()
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
