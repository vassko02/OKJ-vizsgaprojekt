   M S B A M L   `   `   `  ����N  JRecepcio_alkalmazas, Version=1.0.0.0, Culture=neutral, PublicKeyToken=nullE'clr-namespace:Recepcio_alkalmazas.ViewsRecepcio_alkalmazas.Views  5   	   .    (Recepcio_alkalmazas.Views.ComsumptionAdd   5   	   W SPresentationCore, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35\ XPresentationFramework, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35e aSystem.Windows.Controls.Ribbon, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089R NWindowsBase, Version=4.0.0.0, Culture=neutral, PublicKeyToken=31bf3856ad364e35F 9http://schemas.microsoft.com/winfx/2006/xaml/presentation     5   	   R NSystem.Xaml, Version=4.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089:x,http://schemas.microsoft.com/winfx/2006/xaml     5   	   @d2http://schemas.microsoft.com/expression/blend/2008     5   	   Jmc;http://schemas.openxmlformats.org/markup-compatibility/2006     5   	   9local'clr-namespace:Recepcio_alkalmazas.Views     5   	   c _MahApps.Metro.IconPacks.Core, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137ag cMahApps.Metro.IconPacks.Material, Version=4.0.0.0, Culture=neutral, PublicKeyToken=0c0d510f9915137a?	iconPacks-http://metro.mahapps.com/winfx/xaml/iconpacks   6?     � Title$	  Add��5      $	��200��6   $	��250��6    � WindowStartupLocation$ CenterScreen=�6&    � WindowStyle$
 None=�6K    � 
ResizeMode$ NoResize=�6^    � AllowsTransparency$ False��6t   .��5	      �� $��2q�6   
������._�5   
   � -   5         � RowDefinitions 5      �� 5      $
��auto �6    �� 5      $��* �6    ��5      �� 5       �� ImageSource$ ../img/hatter.jpg��6   .+�5      �� $��
Item data:��6   
������$
��Bold"�6D   $��20(�6V   $��5q�6d   $��Center=�6o   �� 5      $��1��6   $��Center=�6&   .+�5      ��  �� Orientation$ 
Horizontal=�6   $��Center=�66   .+�5      �� $��Name:��6   $��50��6,   
������$
��Bold"�6R   �� 5      -   5        $��tb_name��5      $	��150��6G   $��5q�6S   ��6-   �� *
ItemName+6S   5      �� 5      $ 
Horizontal=�6   $��Center=�66   .+�5      �� $��Price:��6   $��50��6-   
������$
��Bold"�6S   �� 5      -   5        $��tb_price��5   K   $	��150��6r   $��5q�6~   ��6[   �� *Price+6~   5      �� 5      $ 
Horizontal=�6   $��Center=�66   .+�5      �� $��Type:��6   $��50��6,   
������$
��Bold"�6R   �� 5      -   5        $��cb_type��5      $	��150��6.   $��5q�6P    �� Text 6:   �� *Type+6P   5       �� 5!      $ 
Horizontal=�6   $��Center=�66   .+�5"      �� -   5        $��btn_save��5"   ;   $��80��6   $
��Bold"�6)   
���   �$��30,15,10,30q�5#      	 � 	Resources	 5$      
 �� 
TargetType �� Property �� Value��%^   '��       �� 5%      "
 ��6$   .�5&   "   ��  �@��CornerRadius$ 5��6A   5'      5(      .��5)      �� $ 
Horizontal=�6%   .+�5*      �� $
��Save��6$   
������$��0,0,5,0q�6N   .  (MahApps.Metro.IconPacks.PackIconMaterial  5+      $��15��69   $��14��6D      Kind$ ContentSave=�6P   
������$��Center=�6~   $��Center=�6�   5,      5-      �� 5.      -   5        $��
btn_cancel��5.   J   $��80��6   $��1��6(   $
��Bold"�68   
���   �$��10,15,30,30q�5/   0   	 50      ��%^   '��       �� 51      "
 ��6$   .�52   "   ��  �@��CornerRadius$ 5��6A   53      54      .��55      �� $ 
Horizontal=�6%   .+�56      �� $��Cancel��6$   
������$��0,0,5,0q�6P     57      $��15��69   $��14��6D   $ Cancel=�6P   
������$��Center=�58   9   $��Center=�6[   59      5:      5;      5<      5=      5>      5?      