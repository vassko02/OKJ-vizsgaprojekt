using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;
using System.Collections.ObjectModel;

namespace Recepcio_alkalmazas.Models
{
    public class room:NotifyPropertyChangedBase
    {
        private int _RoomID;
        public int RoomID
        {
            get { return _RoomID; }
            set { _RoomID = value; onPropertyChanged(); }
        }
        private string _RoomName;
        public string RoomName
        {
            get { return _RoomName; }
            set { _RoomName = value;  onPropertyChanged();
            }
        }
        private int _Capacity;
        public int Capacity
        {
            get { return _Capacity; }
            set { _Capacity = value; onPropertyChanged(); }
        }
        private string _Description;

        public string Description
        {
            get { return _Description; }
            set { _Description = value; onPropertyChanged(); }
        }
        private double _RoomPrice;
        public double RoomPrice
        {
            get { return _RoomPrice; }
            set { _RoomPrice = value; onPropertyChanged();
            }
        }
        public room() { }
        public room(MySqlDataReader reader)
        {
            this.RoomID = Convert.ToInt32(reader["RoomID"]);
            this.RoomName = reader["RoomName"].ToString();
            this.Capacity = Convert.ToInt32(reader["Capacity"]);
            this.Description = reader["Description"].ToString();
            this.RoomPrice = Convert.ToDouble(reader["RoomPrice"]);
        }
        public static ObservableCollection<room> selectAllRooms()
        {
            var lista = new ObservableCollection<room>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT * from room";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new room(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
        public static ObservableCollection<room> selectCorrectRoom(reservation model)
        {
            var lista = new ObservableCollection<room>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT room.RoomID,Room.RoomName FROM `room` LEFT JOIN reservation on room.RoomID = reservation.RoomID" +
                    " WHERE room.Capacity = @guestnumber and (reservation.LeavingDate <= @ArrivalDate " +
                    "or reservation.ArrivalDate >= @LeavingDate OR reservation.ArrivalDate is null)";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@guestnumber", model.GuestNumber);
                    cmd.Parameters.AddWithValue("@ArrivalDate", model.ArrivalDate);
                    cmd.Parameters.AddWithValue("@LeavingDate", model.LeavingDate);

                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new room()
                            {
                                RoomID = Convert.ToInt32(reader["RoomID"]),
                                RoomName = reader["RoomName"].ToString(),

                            });
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
        public static ObservableCollection<room> selectRoomByID(int id)
        {
            var lista = new ObservableCollection<room>();
            using (var con = new MySqlConnection(ConfigurationManager.ConnectionStrings["ConnectionString"].ConnectionString))
            {
                con.Open();
                var sql = "SELECT * from room where room.RoomID=@id";
                using (var cmd = new MySqlCommand(sql, con))
                {
                    cmd.Parameters.AddWithValue("@id", id);
                    using (var reader = cmd.ExecuteReader())
                    {
                        while (reader.Read())
                        {
                            lista.Add(new room(reader));
                        }
                    }
                }
                con.Close();
            }
            return lista;
        }
    }
}
