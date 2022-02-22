using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Configuration;
using System.Text;


namespace Recepcio_alkalmazas.Models
{
    class ratingModel
    {
        public int RatingID { get; set; }
        public string Name { get; set; }
        public string Email { get; set; }
        public string Description { get; set; }
        public int Stars { get; set; }

        public ratingModel(MySqlDataReader reader)
        {
            this.RatingID = Convert.ToInt32(reader["RatingID"]);
            this.Name = reader["Name"].ToString();  
            this.Email = reader["Email"].ToString();
            this.Description = reader["Description"].ToString();
            this.Stars = Convert.ToInt32(reader["Stars"]);
        }
        public ratingModel()
        { }


        public static ObservableCollection<ratingModel> selectRatings()
        {
            var lista = new ObservableCollection<ratingModel>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT * FROM rating ORDER BY Time DESC";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new ratingModel(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}
