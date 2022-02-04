using System;
using System.Collections.Generic;
using System.Text;
using MySql.Data.MySqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using Recepcio_alkalmazas.Models;

namespace Recepcio_alkalmazas.Models
{
    public class storage : NotifyPropertyChangedBase
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
        private string _Type;

        public string Type
        {
            get { return _Type; }
            set { _Type = value; }
        }
        public storage() { }
        public storage(MySqlDataReader reader)
        {
            this.StorageID = Convert.ToInt32(reader["StorageID"]);
            this.ItemName = reader["ItemName"].ToString();
            this.Price = Convert.ToDouble(reader["Price"]);
            this.Type = reader["Type"].ToString();
        }
        public static ObservableCollection<storage> select()
        {
            var lista = new ObservableCollection<storage>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "select * from storage WHERE 1=1";
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
        public static ObservableCollection<storage> selectByType(string type)
        {
            var lista = new ObservableCollection<storage>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "select * from storage where 1=1";
                if (type != "All")
                {
                    sql += " And Type = @type";
                }

                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@type", type);

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
        public static int insert(storage model)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "INSERT INTO storage (ItemName,Price,Type) VALUES " +
                    "(@ItemName,@Price,@Type)";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@Price", model.Price);
                    cmd.Parameters.AddWithValue("@ItemName", model.ItemName);
                    cmd.Parameters.AddWithValue("@Type", model.Type);
                    cmd.ExecuteNonQuery();
                    return (int)cmd.LastInsertedId;
                }
            }
        }
        public static ObservableCollection<storage> selectByName(string name)
        {
            var lista = new ObservableCollection<storage>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "select * from storage where 1=1";
                    sql += " And ItemName = @name";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@name", name);
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
        public static void update(storage model)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "UPDATE storage SET ItemName=@ItemName,Price=@Price,Type=@Type WHERE StorageID=@StorageID";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@StorageID", model.StorageID);
                    cmd.Parameters.AddWithValue("@ItemName", model.ItemName);
                    cmd.Parameters.AddWithValue("@Price", model.Price);
                    cmd.Parameters.AddWithValue("@Type", model.Type);

                    cmd.ExecuteNonQuery();
                }
                con.Close();
            }
        }
    }
}
