using System;
using System.Collections.Generic;
using System.Text;
using MySql.Data.MySqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using Recepcio_alkalmazas.Models;


namespace Recepcio_alkalmazas.Models
{
    class storage : NotifyPropertyChangedBase
    {
        private int _StorageID;

        public int StorageID
        {
            get { return _StorageID; }
            set { _StorageID = value; }
        }
        private string _ItemName;

        public string ItemName
        {
            get { return _ItemName; }
            set { _ItemName = value; }
        }
        private double _Price;

        public double Price
        {
            get { return _Price; }
            set { _Price = value; }
        }
        public storage() { }
        public storage(MySqlDataReader reader)
        {
            this.StorageID = Convert.ToInt32(reader["StorageID"]);
            this.ItemName = reader["ItemName"].ToString();
            this.Price = Convert.ToDouble(reader["Price"]);
        }
        public static ObservableCollection<storage> select()
        {
            var lista = new ObservableCollection<storage>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "select * from storage";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new storage(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
        public static ObservableCollection<storage> selectClickedItem(string itemname)
        {
            var lista = new ObservableCollection<storage>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "select * from storage where ItemName=@name order by Type,ItemName";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@name", itemname);
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new storage(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}
