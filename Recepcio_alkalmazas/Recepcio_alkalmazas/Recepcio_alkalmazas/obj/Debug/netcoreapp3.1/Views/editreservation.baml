   M S B A M L   `   `   `  ����N  JRecepcio_alkalmazas, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullE'clr-namespace:Recepcio_alkalmazas.pagesRecepcio_alkalmazas.pages  5      /    )Recepcio_alkalmazas.pages.editreservation   5      W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5      R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5      Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5      @d2http://schemas.microsoft.com/expression/blend/2008     5      9local'clr-namespace:Recepcio_alkalmazas.pages     5      c _MahApps.Metro.IconPacks.Core, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137ag cMahApps.Metro.IconPacks.Material, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137a?	iconPacks-http://metro.mahapps.com/winfx/xaml/iconpacks   6=     N� Title$  editreservation��5	       � 	Resources 5
      &   System.Windows.Controls.DataGrid �� 
TargetType �� Property �� Value��%T   '        �� 5   
   "  6   .�5      ��  � ��
 ����6+   5      5      .��5      �  � ColumnDefinitions 5   
   �� 5      $	��270 �6   �� 5      $��* �6    � RowDefinitions 5   
   �� 5      $
��auto �6   �� 5      $��* �6   .+�5   
   ��  �� Orientation$ Vertical=�6   $��Center=�6,   $��0��6G   $	��260��6W   $
��Left=�6c   .+�5      �� $��Guest name:��6   $��Center=�6*   $��16(�6G   $
��Bold"�6U   $��5q�6g   
������$	��200��6�   �� 5      -   5        $��tb_guestinput��5   i   $	��200��6   $
��Bold"�6"   $��25��64   $��18(�6@   
������$��Center=�6~   $��5q�6�   5      5      �� 5   
   $��1��6   $��2��6"   .+�5      �� $��Reservations:��6   $��20(�6,   $
��Bold"�6:   
������$��5q�6g     5      -   5        $��dg_foglalasok��5   �   $��5q�6   
�������$
��Bold"�65   $	��700��6G      AutoGenerateColumns$ False��6k   $	��300��6�   	   GridLinesVisibility$
	 None=�5       
   RowBackground
 �#36393f���#36393f$��Center=�5!         SelectionUnit$ FullRow=�6:   $��0q�6R      
IsReadOnly$
 True��6f      HeadersVisibility$ Column=�6x   ��5   S   ��  5"      =  7System.Windows.Controls.Primitives.DataGridColumnHeader �� BasedOn��%a   '        7 �� 5#      8   "  6U   .�5$      ��  � �� �#35363867   5%      5&         Columns 5'      0  *System.Windows.Controls.DataGridTextColumn  5(      ,  &System.Windows.Controls.DataGridColumn   Header$ 
Guest name��6)      Width5  /System.Windows.Controls.DataGridLengthConverter$ 90 6V   1  +System.Windows.Controls.DataGridBoundColumn   Binding 6=   �� *Name+6V     5)      $ Check-in��6)   $
 auto 6;    6H   �� *ArrivalDate+ �� StringFormat$ yyyy.MM.dd.��  5*      $ 	Check-out��6)   $
 auto 6<    6I   �� *LeavingDate+$ yyyy.MM.dd.��  5+      $ Service��6)   $	 100 6:    6F   �� *ServiceType+  5,      $ 	Room name��6)   $	 220 6<    6H   �� *
RoomName+  5-      $ Price��6)   $ 60 68    6C   �� *Price+$
 ${0}��  5.      $ Is Checked In��6)   $ * 6@    6J   �� *IsCheckedIn+51      52      �� 53   
   $��1��6   .+�54      �� $ 
Horizontal=�6   .+�55      �� -   5        $��btn_hozzaad��55   C   $��5q�6   $
��Bold"�6%   $	��180��67   
���   �
������$��20,10,30,10q�6�    56      ��%^   '��       �� 57      " ��6    .�58      ��  �@��CornerRadius$ 5��6=   59      5:      .��5;      �� $ 
Horizontal=�6!   .+�5<      �� $��Add new reservation��6    
������$��0,0,5,0q�6Y   .  (MahApps.Metro.IconPacks.PackIconMaterial  5=      $��15��65   $��14��6@      Kind$ PlusBox=�6L   
������$��Center=�6v   $��Center=�6�   5>      5?      �� 5@      -   5        $��btn_edit��5@   C   $��5q�6   $
��Bold"�6%   $	��200��67   
���   �
������$��30,10,30,10q�6�    5A      ��%^   '��       �� 5B      " ��6    .�5C      ��  �@��CornerRadius$ 5��6=   5D      5E      .��5F      �� $ 
Horizontal=�6!   .+�5G      �� $��Edit selected reservation��6    
������$��0,0,5,0q�6`     5H      $��15��65   $��14��6@   $ BookEdit=�6L   
������$��Center=�6w   $��Center=�6�   5I      5J      5K      �� 5L      $ 
Horizontal=�6   .+�5M      �� -   5        $��btn_guestadd��5M   C   $��5q�6   $
��Bold"�6%   $	��180��67   
���   �
������$��20,10,30,10q�6�    5N      ��%^   '��       �� 5O      " ��6    .�5P      ��  �@��CornerRadius$ 5��6=   5Q      5R      .��5S      �� $ 
Horizontal=�6!   .+�5T      �� $��Add new guest��6    
������$��0,0,5,0q�6T     5U      $��15��65   $��14��6@   $ PlusBox=�6L   
������$��Center=�6v   $��Center=�6�   5V      5X      �� 5Y      -   5        $��
btn_torles��5Y   C   $��5q�6   $
��Bold"�6%   $	��200��67   
���   �
������$��30,10,30,10q�6�    5Z      ��%^   '��       �� 5[      " ��6    .�5\      ��  �@��CornerRadius$ 5��6=   5]      5^      .��5_      �� $ 
Horizontal=�6!   .+�5`      �� $!��Delete selected reservation��6!   
������$��0,0,5,0q�6c     5a      $��15��65   $��14��6@   $ Delete=�6L   
������$��Center=�6u   $��Center=�6�   5b      5c      5d      5e      5f      5g      