   M S B A M L   `   `   `  ����N  JRecepcio_alkalmazas, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullE'clr-namespace:Recepcio_alkalmazas.pagesRecepcio_alkalmazas.pages  5      +    %Recepcio_alkalmazas.pages.guestleaves   5      W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5      R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5      Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5      @d2http://schemas.microsoft.com/expression/blend/2008     5      9local'clr-namespace:Recepcio_alkalmazas.pages     5      c _MahApps.Metro.IconPacks.Core, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137ag cMahApps.Metro.IconPacks.Material, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137a?	iconPacks-http://metro.mahapps.com/winfx/xaml/iconpacks   6=     N� Title$  guestleaves��5	      .��5      �  � ColumnDefinitions 5   
   �� 5      $	��270 �6   �� 5      $	��250 �6   �� 5      .+�5   
   ��  �� Orientation$ Vertical=�6   $��0��6,   $	��260��6<   $
��Left=�6H   .+�5      �� $��Guest name:��6   $��Center=�6*   $��16(�6G   $
��Bold"�6U   $��5q�6g   
������$	��200��6�   �� 5      -   5        $��tb_guestinput��5   O   $	��200��6   $
��Bold"�6"   
������$��Center=�6d   $��5q�6�   ��5      �� *
SearchText+ �� UpdateSourceTrigger$ PropertyChanged=�6_   &   System.Windows.Controls.DataGrid  5      -   5        $��dg_nevek��5   �   $��5q�6   
�������$
��Bold"�65   $	��200��6G      AutoGenerateColumns$ False��6k   $	��150��6�      CanUserAddRows$ False��6�      GridLinesVisibility$
 None=�5      $��0q�66      RowBackground �#36393f���#36393f$��Center=�5         SelectionUnit$ FullRow=�64   	   
IsReadOnly$
	 True��6L   $
 �� IsSynchronizedWithCurrentItem$

 TrueY�6^      HeadersVisibility$ Column=�6�   ��5   S   ��  � 	Resources 5      =  7System.Windows.Controls.Primitives.DataGridColumnHeader �� BasedOn �� 
TargetType �� Property �� Value��%a   '        7 �� 5      8   "  6U   .�5      ��  � �� �#35363867   5      5         Columns 5      0  *System.Windows.Controls.DataGridTextColumn  5      ,  &System.Windows.Controls.DataGridColumn   Header$ 
Guest name��6)      Width5  /System.Windows.Controls.DataGridLengthConverter$ * 6V   1  +System.Windows.Controls.DataGridBoundColumn   Binding 6=   �� *Name+6V     5      $ Room number��6)   $	 100 6Y    6>   �� *RoomID+6Y   5!      5"      �� 5#   
   $��1��6   .+�5$      �� $��Reciept:��6   $��Center=�6'   $��16(�6D   $
��Bold"�6R   $��-5,5,0,5q�6d   
������$	��200��6�     5%      -   5        $��dg_fogyasztas��5%   �   $	��200��6   $	��300��6#   $ FullRow=�60   $ Column=�6`   $

 TrueY�6{   $ False��5&      $ False��63   $��0q�6J      CanUserDeleteRows$ False��6^   $��Center=�6x   $
	 True��6�   
�������$
 None=�6�   $
��Bold"�5'      ���#36393f �#36393f��5%   H   ��  5(      ��%a   '        7 �� 5)      8   "  6U   .�5*      ��  � �� �#35363867   5+      5,       5-        5.      $
 Name��6)   $ * 67      
FontWeight$
 Bold"�6A    6S   �� *
ItemName+  5/      $ Price��6)   $ 50 68    6C   �� *Price+ �� StringFormat$ $ {0}��51      52      �� 53   
   $��2��6   $��Center=�6%   .+�54      �� $��Price:��6   $
��Left=�6%   $��16(�6@   $
��Bold"�6N   $��5q�6`   
������$	��200��6�   �� 55      -   5        $��lbl_vegosszeg��55   �   $��$��6   $
��Left=�6    $��16(�6;   $
��Bold"�6I   $��5q�6[   
������$	��200��6�   �� 56      $��Payment:��6   $
��Left=�6'   $��16(�6B   $
��Bold"�6P   $��5q�6b   
������$	��200��6�   �� 57      $ 
Horizontal=�6   .+�58      d� -   5        $��btn_keszpenz��58      $��5q�6   $
��Bold"�6+   $	��100��6=   $
��Left=�6d   $
��Cash��6�   
���   �
������$��	5,10,5,10q�6�    59      ��%^   '��       �� 5:      " ��6    .�5;      ��  �@��CornerRadius$ 5��6=   5<      5=      5>      d� 5?      -   5        $��
btn_kartya��5?   }   $��5q�6   $
��Bold"�6D   $	��100��6V   $
��Left=�6b   $
��Card��6�   
���   �
������$��	5,10,5,10q�6�    5@      ��%^   '��       �� 5A      " ��6    .�5B      ��  �@��CornerRadius$ 5��6=   5C      5D      5E      5F      �� 5G      $ 
Horizontal=�6   .+�5H      �� $��Amount payed:��6   $
��Left=�60   $��16(�6K   $
��Bold"�6Y   $��0,5,5,5q�6k   
������$	��125��6�   �� 5I      $��$��6   $
��Left=�6$   $��14(�6?   $
��Bold"�6M   $��5,5,0,5q�6_   
������$��20��6�   �� 5J      -   5        $��tb_fizetett��5K      $��0,5,5,5q�5J      
������$
��Bold"�5K   H   $��16(�6Z   $��50��5L   X   {�6   ��  �� ElementName$ btn_keszpenz�� �� Path$ 	IsChecked�6c   5M      �� 5N      $ 
Horizontal=�6   .+�5O      �� $��Change:��6   $
��Left=�6*   $��16(�6E   $
��Bold"�6S   $��5q�6e   
������$	��125��6�   �� 5P      -   5        $��	tb_change��5P   '   $��5q�6   $��$��68   $��16(�6A   
������$
��Bold"�6j   $��Center=�6|   $	��100��6�   5Q      �� 5R      -	   5        $��btn_fizetes��5R   3   $��5q�6   $
��Bold"�6!   
���   �$��30,10,30,10q�6Y    5S      ��%^   '��       �� 5T      " ��6   .�5U      ��  �@��CornerRadius$ 5��69   5V      5W      .��5X      �� $ 
Horizontal=�6   .+�5Y      �� $	��Pay��6   
������$��0,0,5,0q�6E   .  (MahApps.Metro.IconPacks.PackIconMaterial  5Z      $��15��61   $��14��6<      Kind$ CurrencyUsd=�6H   
������$��Center=�6v   $��Center=�6�   5[      5\      5]      5^      5_      