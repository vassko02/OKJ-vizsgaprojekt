using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;


namespace Recepcio_alkalmazas.Models
{
    public class servicetype
    {
        public int ServiceID { get; set; }
        public double Price { get; set; }
        public string ServiceType { get; set; }
        public servicetype(){ }
        public servicetype(MySqlDataReader reader)
        {
            this.ServiceID = Convert.ToInt32(reader["ServiceID"]);
            this.Price = Convert.ToDouble(reader["Price"]);
            this.ServiceType = reader["ServiceType"].ToString();
        }
        public static List<servicetype> selectAllNames()
        {
            var lista = new List<servicetype>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "Select * from servicetype";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new servicetype(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }

}
