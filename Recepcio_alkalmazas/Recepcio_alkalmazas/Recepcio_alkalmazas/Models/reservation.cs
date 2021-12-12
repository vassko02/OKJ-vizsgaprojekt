using System;
using System.Collections.Generic;
using System.Text;
using MySql.Data.MySqlClient;
using System.Configuration;
using System.Collections.ObjectModel;
using Recepcio_alkalmazas.Models;

namespace Recepcio_alkalmazas.Models
{
    public class reservation: NotifyPropertyChangedBase
    {
        private int _ReservationID;
        public int ReservationID
        {
            get { return _ReservationID; }
            set { _ReservationID = value; onPropertyChanged(); }
        }
        private int _GuestNumber;
        public int GuestNumber
        {
            get { return _GuestNumber; }
            set { _GuestNumber = value; onPropertyChanged(); }
        }
        private double _Price;

        public double Price
        {
            get { return _Price; }
            set { _Price = value; onPropertyChanged(); }
        }
        private int _Children;

        public int Children
        {
            get { return _Children; }
            set { _Children = value; onPropertyChanged(); }
        }
        private int _Adults;

        public int Adults
        {
            get { return _Adults; }
            set { _Adults = value; onPropertyChanged(); }
        }
        private DateTime _ArrivalDate;

        public DateTime ArrivalDate
        {
            get { return _ArrivalDate; }
            set { _ArrivalDate = value;  }
        }
        private DateTime _LeavingDate;

        public DateTime LeavingDate
        {
            get { return _LeavingDate; }
            set { _LeavingDate = value;  }
        }
        private int _CustomerID;

        public int CustomerID
        {
            get { return _CustomerID; }
            set { _CustomerID = value; onPropertyChanged(); }
        }

        private int _ServiceID;

        public int ServiceID
        {
            get { return _ServiceID; }
            set { _ServiceID = value; onPropertyChanged(); }
        }

        private int _RoomID;

        public int RoomID
        {
            get { return _RoomID; }
            set { _RoomID = value; onPropertyChanged(); }
        }
        private int _Capacity;

        public int Capacity
        {
            get { return _Capacity; }
            set { _Capacity = value; onPropertyChanged(); }
        }

        public string Name { get; set; }
        public string PhoneNumber { get; set; }
        public string Email { get; set; }

        private string _RoomName;
        public string RoomName
        {
            get { return _RoomName; }
            set { _RoomName = value; onPropertyChanged(); }
        }
        private string _ServiceType;

        public string ServiceType
        {
            get { return _ServiceType; }
            set { _ServiceType = value; onPropertyChanged(); }
        }

        private double _RoomPrice;

        public double RoomPrice
        {
            get { return _RoomPrice; }
            set { _RoomPrice = value; onPropertyChanged(); }
        }
        private double _ServicePrice;

        public double ServicePrice
        {
            get { return _ServicePrice; }
            set { _ServicePrice = value; onPropertyChanged(); }
        }
        private int _IsCheckedIn;
        public int IsCheckedIn
        {
            get { return _IsCheckedIn; }
            set { _IsCheckedIn = value; onPropertyChanged(); }
        }
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
            this.Email = reader["Email"].ToString();
            this.RoomName = reader["RoomName"].ToString();
            this.ServiceType = reader["ServiceType"].ToString();
            this.RoomPrice = Convert.ToDouble(reader["RoomPrice"]);
            this.ServicePrice = Convert.ToDouble(reader["ServicePrice"]);
            this.IsCheckedIn = Convert.ToInt32(reader["IsCheckedIn"]);
        }
        public static ObservableCollection<reservation> selectByGuestName(string name,int becheckolt,bool editlesz)
        {
            var lista = new ObservableCollection<reservation>();
            using (var con= new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT reservation.*,customer.Name,customer.PhoneNumber,customer.Email,room.RoomName,room.RoomPrice,room.Capacity,servicetype.ServiceType,servicetype.ServicePrice " +
                    "FROM reservation INNER JOIN customer ON reservation.CustomerID=customer.CustomerID "+
                    "join room ON `reservation`.`RoomID` = room.RoomID " +
                    "join servicetype ON `reservation`.ServiceID = servicetype.ServiceID Where 1=1";
                if (!string.IsNullOrEmpty(name))
                {
                    sql += " AND customer.Name LIKE @name";
                }
                if (becheckolt==0&&editlesz==false)
                {
                    sql += " AND reservation.ArrivalDate = current_date";
                }
                if (editlesz==true)
                {
                    sql += " AND reservation.ArrivalDate > current_date";
                }
                sql += " AND reservation.IsCheckedIn = @checkedin ORDER BY customer.Name";
                using (var cmd = new MySqlCommand(sql,con))
                {
                    cmd.Parameters.AddWithValue("@name","%"+name+"%");
                    cmd.Parameters.AddWithValue("@checkedin",becheckolt);
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
        public static int insert(reservation model)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "INSERT INTO reservation (GuestNumber,Price,Children,Adults,ArrivalDate,LeavingDate,CustomerID,RoomID,ServiceID) VALUES " +
                    "(@GuestNumber,@Price,@Children,@Children,@ArrivalDate,@LeavingDate,@CustomerID,@RoomID,@ServiceID)";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@GuestNumber", model.GuestNumber);
                    cmd.Parameters.AddWithValue("@Price", model.Price);
                    cmd.Parameters.AddWithValue("@Children", model.Children);
                    cmd.Parameters.AddWithValue("@Adults", model.Adults);
                    cmd.Parameters.AddWithValue("@ArrivalDate", model.ArrivalDate);
                    cmd.Parameters.AddWithValue("@LeavingDate", model.LeavingDate);
                    cmd.Parameters.AddWithValue("@CustomerID", model.CustomerID);
                    cmd.Parameters.AddWithValue("@RoomID", model.RoomID);
                    cmd.Parameters.AddWithValue("@ServiceID", model.ServiceID);
                    cmd.ExecuteNonQuery();
                    return (int)cmd.LastInsertedId;
                }
            }
        }
        public static void update(reservation model)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "UPDATE reservation SET GuestNumber=@GuestNumber,Price=@Price,Children=@Children,Adults=@Adults,ArrivalDate=@ArrivalDate," +
                    "LeavingDate=@LeavingDate,CustomerID=@CustomerID,RoomID=@RoomID,ServiceID=@ServiceID WHERE ReservationID=@id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@GuestNumber", model.GuestNumber);
                    cmd.Parameters.AddWithValue("@Price", model.Price);
                    cmd.Parameters.AddWithValue("@Children", model.Children);
                    cmd.Parameters.AddWithValue("@Adults", model.Adults);
                    cmd.Parameters.AddWithValue("@ArrivalDate", model.ArrivalDate);
                    cmd.Parameters.AddWithValue("@LeavingDate", model.LeavingDate);
                    cmd.Parameters.AddWithValue("@CustomerID", model.CustomerID);
                    cmd.Parameters.AddWithValue("@RoomID", model.RoomID);
                    cmd.Parameters.AddWithValue("@ServiceID", model.ServiceID);
                    cmd.Parameters.AddWithValue("@id", model.ReservationID);
                    cmd.ExecuteNonQuery();
                }
                con.Close();
            }
        }
        public static void updateCheckedin(int id,int bevagyki)
        {
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "UPDATE reservation SET IsCheckedIn=@bevagyki WHERE ReservationID=@id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@bevagyki", bevagyki);
                    cmd.Parameters.AddWithValue("@id", id);

                    cmd.ExecuteNonQuery();
                }
                con.Close();
            }
        }
    }
}
