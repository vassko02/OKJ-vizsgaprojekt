   M S B A M L   `   `   `  ����N  JRecepcio_alkalmazas, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullE'clr-namespace:Recepcio_alkalmazas.ViewsRecepcio_alkalmazas.Views  5   	   (    "Recepcio_alkalmazas.Views.AddGuest   5   	   W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   9local'clr-namespace:Recepcio_alkalmazas.Views     5   	   c _MahApps.Metro.IconPacks.Core, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137ag cMahApps.Metro.IconPacks.Material, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137a?	iconPacks-http://metro.mahapps.com/winfx/xaml/iconpacks   6?     � Title$  AddGuest��5   	   $	��200��6   $	��250��6'    � WindowStartupLocation$ CenterScreen=�63    � WindowStyle$
 None=�6X    � 
ResizeMode$ NoResize=�6k    � AllowsTransparency$ False��6�   .��5	      �� $��2q�6   
������._�5   
   �  � RowDefinitions 5      �� 5      $
��auto �6    �� 5      $��* �6    ��5      �� 5       �� ImageSource$ ../img/hatter.jpg��6   .+�5      �� $��Guest data:��6   
������$
��Bold"�6E   $��20(�6W   $��5q�6e   $��Center=�6p   �� 5      $��1��6   $��Center=�6&   .+�5      ��  �� Orientation$ 
Horizontal=�6   $��Center=�66   .+�5      �� $��Guest name:��6   $	��100��62   
������$
��Bold"�6Y   �� 5      -   5        $��tb_guestname��5      $	��100��6H   $��5q�6T   ��62   �� *Name+6T   5      �� 5      $ 
Horizontal=�6   $��Center=�66   .+�5      �� $��Phone number:��6   $	��100��64   
������$
��Bold"�6[   �� 5      -   5        $��tb_phonenumber��5      $	��100��6Q   $��5q�6]   ��64   �� *PhoneNumber+6]   5      �� 5      $ 
Horizontal=�6   $��Center=�66   .+�5      �� $��Email address:��6   $	��100��65   
������$
��Bold"�6\   �� 5      -   5        $��tb_email��5      $	��100��6.   $��5q�6Q   ��6:   �� *Email+6Q   5       �� 5!      $ 
Horizontal=�6   $��Center=�66   .+�5"      �� $��Address:��6   $	��100��6/   
������$
��Bold"�6V   �� 5#      -   5        $��
tb_address��5#      $	��100��60   $��5q�6U   ��6<   �� *	Address+6U   5$      �� 5%      $ 
Horizontal=�6   $��Center=�66   .+�5&      �� -   5        $��btn_save��5&   :   $��80��6   $
��Bold"�6(   
���   �$��30,10,10,10q�6]    � 	Resources 5'      	 �� 
TargetType
 �� Property �� Value��%^   '��       �� 5(      "	 ��6$   .�5)   "   �� 
 �@��CornerRadius$ 5��6A   5*      5+      .��5,      �� $ 
Horizontal=�6%   .+�5-      �� $
��Save��6$   
������$��0,0,5,0q�6N   .  (MahApps.Metro.IconPacks.PackIconMaterial  5.      $��15��69   $��14��6D      Kind$ ContentSave=�6P   
������$��Center=�6~   $��Center=�6�   5/      50      �� 51      -   5        $��
btn_cancel��51   J   $��80��6   $��1��6(   $
��Bold"�68   
���   �$��10,10,30,10q�6o    52      ��%^   '��       �� 53      "	 ��6$   .�54   "   �� 
 �@��CornerRadius$ 5��6A   55      56      .��57      �� $ 
Horizontal=�6%   .+�58      �� $��Cancel��6$   
������$��0,0,5,0q�6P     59      $��15��69   $��14��6D   $ Cancel=�6P   
������$��Center=�6y   $��Center=�6�   5:      5;      5<      5=      5>      5?      5@      