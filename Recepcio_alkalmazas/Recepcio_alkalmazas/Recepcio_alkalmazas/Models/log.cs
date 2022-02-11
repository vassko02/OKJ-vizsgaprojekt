using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;
using System.Collections.ObjectModel;
namespace Recepcio_alkalmazas.Models
{
    class log
    {
        public int LogID { get; set; }
        public string Name { get; set; }
        public string Status { get; set; }
        public int ReservationID { get; set; }
        public int UserID { get; set; }

        public log(MySqlDataReader reader)
        {
            this.LogID = Convert.ToInt32(reader["LogID"]);
            this.Name = reader["Name"].ToString();
            this.Status = reader["Status"].ToString();
            this.UserID = Convert.ToInt32(reader["UserID"]);
            this.ReservationID = Convert.ToInt32(reader["ReservationID"]);
        }
        public log()
        {}
        public static void callInsertIntoLog(string name,string status,string table,int id)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "call InsertIntoLog(@name,@status,@table,@id);";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@name", name);
                    cmd.Parameters.AddWithValue("@status", status);
                    cmd.Parameters.AddWithValue("@table", table);
                    cmd.Parameters.AddWithValue("@id", id);

                    cmd.ExecuteNonQuery();

                }
                con.Close();
            }
        }

        
    }
}
